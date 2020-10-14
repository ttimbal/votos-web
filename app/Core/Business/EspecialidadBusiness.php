<?php


namespace App\Core\Business;


use App\Core\Repositories\EspecialidadRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecialidadBusiness
{
    protected $especialidadRepository;

    public function __construct(EspecialidadRepository $especialidadRepository)
    {
        $this->especialidadRepository = $especialidadRepository;
    }

    public function index()
    {
        try {
            $especialidades = $this->especialidadRepository->all();
            $data['especialidades'] = $especialidades;

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

            $this->especialidadRepository->storeOne($request);

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
            $especialidad = $this->especialidadRepository->find($id);
            $data['especialidad'] = $especialidad;
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

            $this->especialidadRepository->updateOne($request, $id);

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

            $this->especialidadRepository->destroy($id);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
