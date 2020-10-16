<?php

namespace App\Http\Controllers;

use App\Core\Business\AsientoBusiness;
use Illuminate\Http\Request;

class AsientoController extends Controller
{
    protected $asientoBusiness;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AsientoBusiness $asientoBusiness)
    {
        $this->asientoBusiness=$asientoBusiness;
    }
    public function index($municipio_id)
    {
        $asientos= $this->asientoBusiness->asientosByMunicipio($municipio_id);
       // return $asientos['data']['asientos'];
        return view('asiento', [
            'asientos' => $asientos['data']['asientos']
        ]);
    }
}
