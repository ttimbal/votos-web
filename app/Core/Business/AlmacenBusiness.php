<?php


namespace App\Core\Business;


use App\Core\Repositories\AlmacenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmacenBusiness
{
    protected $almacenRepository;

    public function __construct(AlmacenRepository $almacenRepository)
    {
        $this->almacenRepository = $almacenRepository;
    }

    public function index()
    {
        try {
            $almacenes = $this->almacenRepository->all();
            $data['almacenes'] = $almacenes;
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

            $this->almacenRepository->store($request);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function show($codigo)
    {
        try {
            $almacen = $this->almacenRepository->find($codigo);
            $instrumentos = $almacen->instrumentos;
            $data['almacen'] = $almacen;
            $data['instrumentos'] = $instrumentos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception)
        {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function update(Request $request, $codigo)
    {
        try {
            DB::beginTransaction();

            $this->almacenRepository->update($request, $codigo);

            DB::commit();
            return ['succes' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }

    public function destroy($codigo)
    {
        try {
            DB::beginTransaction();

            $this->almacenRepository->destroy($codigo);

            DB::commit();
            return ['succes' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
