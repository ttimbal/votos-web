<?php

namespace App\Http\Controllers;

use App\Core\Business\MesaRecintoBusiness;
use App\Core\Models\VotoPostulante;
use App\Http\Requests\VotosStoreRequest;
use Illuminate\Http\Request;

class MesaRecintoController extends Controller
{
    protected $mesaRecintoBusiness;

    public function __construct(MesaRecintoBusiness $mesaRecintoBusiness)
    {
        $this->mesaRecintoBusiness=$mesaRecintoBusiness;
    }
    public function index($recinto_id)
    {
        $mesaRecinto= $this->mesaRecintoBusiness->index($recinto_id);
        //return $mesaRecinto;
         //return $mesaRecinto['data']['mesa_recinto'];
        return view('mesa', [
            'mesaRecinto' => $mesaRecinto['data']['mesa_recinto']
        ]);
    }
    public function store(VotosStoreRequest $request)
    {

        //return $request;
       // return  VotoPostulante::find([1, 2, 3]);
            //->where('postulante_id', $voto['id'])
        $respuesta = $this->mesaRecintoBusiness->store($request);
        if ($respuesta['success'])
        {
            return 'hecho';
            //return redirect()->route('administrativos.index');
        }
        echo $respuesta['error'];
        return $request;
        //return back()->withErrors($respuesta['error']);
    }
}
