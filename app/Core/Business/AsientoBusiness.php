<?php


namespace App\Core\Business;


use App\Core\Models\Asiento;

use App\Core\Repositories\AsientoRepository;

use App\Core\Repositories\RolRepository;
use App\Core\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsientoBusiness
{
    protected $asientoRespository;

    public function __construct(AsientoRepository $asientoRepository)
    {
        $this->asientoRepository = $asientoRepository;

    }

    public function asientosByMunicipio($municipio_id)
    {

        try {
            $asientos = Asiento::select('*')->where('municipio_id',$municipio_id)->get();
            $asientos->load('recintos');
            $data['asientos'] = $asientos;
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'error' => $exception->getMessage()];
        }
    }



    public function create()
    {
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
