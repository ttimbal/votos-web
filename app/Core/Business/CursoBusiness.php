<?php


namespace App\Core\Business;


use App\Core\Repositories\CursoRepository;
use App\Core\Repositories\MateriaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoBusiness
{
    protected $cursoRepository;
    protected $materiaRepository;

    public function __construct(CursoRepository $cursoRepository,
                                MateriaRepository $materiaRepository)
    {
        $this->cursoRepository = $cursoRepository;
        $this->materiaRepository = $materiaRepository;
    }

    public function index()
    {
        try {
            $cursos = $this->cursoRepository->all();
            $data['cursos'] = $cursos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->cursoRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($codigo)
    {
        try {
            $curso = $this->cursoRepository->find($codigo);
            $materias = $this->materiaRepository->materias($curso->codigo);
            $data['curso'] = $curso;
            $data['materias'] = $materias;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $codigo)
    {
        try {
            DB::beginTransaction();

            $curso = $this->cursoRepository->update($request, $codigo);
            $data['curso'] = $curso;

            DB::commit();
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($codigo)
    {
        try {
            DB::beginTransaction();

            $this->cursoRepository->delete($codigo);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
