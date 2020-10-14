<?php


namespace App\Core\Business;


use App\Core\Repositories\PeriodoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoBusiness
{
    protected $periodoRepository;

    public function __construct(PeriodoRepository $periodoRepository)
    {
        $this->periodoRepository = $periodoRepository;
    }

    public function index()
    {
        try {
            $periodos = $this->periodoRepository->all();
            $data['periodos'] = $periodos;
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

            $this->periodoRepository->store($request);

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
            $periodo = $this->periodoRepository->find($codigo);
            $data['periodo'] = $periodo;
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

            $this->periodoRepository->update($request, $codigo);

            DB::commit();
            return ['success' => true];
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

            $this->periodoRepository->destroy($codigo);

            DB::commit();
            return ['success' => true];
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }
}
