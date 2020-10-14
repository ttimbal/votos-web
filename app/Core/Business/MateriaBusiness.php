<?php


namespace App\Core\Business;


use App\Core\Repositories\CursoRepository;
use App\Core\Repositories\DetallePromocionRepository;
use App\Core\Repositories\MateriaCarreraRepository;
use App\Core\Repositories\MateriaCursoRepository;
use App\Core\Repositories\MateriaRepository;
use App\Core\Repositories\PromocionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaBusiness
{
    protected $materiaRepository;
    protected $cursoRepository;
    protected $promocionRepository;
    protected $detallePromocionRepository;
    protected $materiaCursoRepository;

    public function __construct(MateriaRepository $materiaRepository,
                                CursoRepository $cursoRepository,
                                PromocionRepository $promocionRepository,
                                DetallePromocionRepository $detallePromocionRepository,
                                MateriaCursoRepository $materiaCursoRepository)
    {
        $this->materiaRepository = $materiaRepository;
        $this->cursoRepository = $cursoRepository;
        $this->promocionRepository = $promocionRepository;
        $this->detallePromocionRepository = $detallePromocionRepository;
        $this->materiaCursoRepository = $materiaCursoRepository;

    }

    public function index()
    {
        try {
            $materias = $this->materiaRepository->all();
            foreach ($materias as $materia)
            {
                $materia->cursos = $this->cursoRepository->cursos($materia->sigla);
                $materia->promociones = $this->promocionRepository->promociones($materia->sigla);
            }
            $data['materias'] = $materias;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        try {
            $promociones = $this->promocionRepository->all();
            $cursos = $this->cursoRepository->all();
            $data['promociones'] = $promociones;
            $data['cursos'] = $cursos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->materiaRepository->store($request);
            $this->materiaCursoRepository->store($request);
            $this->detallePromocionRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($sigla)
    {
        try {
            $materia = $this->materiaRepository->find($sigla);
            $promociones = $this->promocionRepository->promociones($materia->sigla);
            $cursos = $this->cursoRepository->cursos($materia->sigla);
            $data['materia'] = $materia;
            $data['promociones'] = $promociones;
            $data['cursos'] = $cursos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($sigla)
    {
        try {
            $materia = $this->materiaRepository->find($sigla);
            $promociones_materia = $this->promocionRepository->promociones($sigla);
            $carreras_materia = $this->cursoRepository->cursos($sigla);
            $cursos = $this->cursoRepository->all();
            $promociones = $this->promocionRepository->all();
            $data['materia'] = $materia;
            $data['carreras_materia'] = $carreras_materia;
            $data['promociones_materia'] = $promociones_materia;
            $data['cursos'] = $cursos;
            $data['promociones'] = $promociones;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $sigla)
    {
        try {
            DB::beginTransaction();

            $this->materiaRepository->update($request, $sigla);
            $this->materiaCursoRepository->update($request, $sigla);
            $this->detallePromocionRepository->update($request, $sigla);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            //throw new \Exception('Error: ' . $exception->getMessage());
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($sigla)
    {
        try {
            DB::beginTransaction();

            $this->materiaRepository->destroy($sigla);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
