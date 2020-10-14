<?php


namespace App\Core\Business;


use App\Core\Repositories\HorarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioBusiness
{
    protected $horarioRepository;

    public function __construct(HorarioRepository $horarioRepository)
    {
        $this->horarioRepository = $horarioRepository;
    }

    public function index()
    {
        try {
            $horarios = $this->horarioRepository->all();
            $data['horarios'] = $horarios;

            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function create()
    {
        return $this->horarioRepository->getDias();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->horarioRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            $horario = $this->horarioRepository->find($id);
            $data['horario'] = $horario;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function edit($id)
    {
        try {
            $horario = $this->horarioRepository->find($id);
            $dias = $this->horarioRepository->getDias();
            $data['horario'] = $horario;
            $data['dias'] = $dias;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->horarioRepository->update($request, $id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->horarioRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
