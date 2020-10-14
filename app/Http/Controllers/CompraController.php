<?php

namespace App\Http\Controllers;

use App\Core\Models\Compra;
use App\Core\Models\Pedido;
use App\Core\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $compras = Compra::all();
            $compras->load('proveedor');
            $compras->load('pedido');
            //return $compras;
            return view('compra.compra.index', ['compras' => $compras]);
        } catch (\Exception $exception) {
            throw new \Exception('Error: '.$exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $proveedores->load('persona');
        $pedidos = Pedido::all();
        //return $proveedores;
        return view('compra.compra.create', ['proveedores' => $proveedores, 'pedidos' => $pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function show($numero)
    {
        try {
            $compra = Compra::findOrFail($numero);
            $compra->detalles = DB::select('SELECT * FROM detalle_compras, instrumentos, nombre_instrumentos WHERE compra_numero = :numero and instrumento_numero = numero and nombre_instrumento_id = id', ['numero' => $numero]);
            //return $compra;
            return view('compra.compra.show', ['compra' => $compra]);
        } catch (\Exception $exception) {
            throw new \Exception('Error: '.$exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function edit($numero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $numero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function destroy($numero)
    {
        //
    }
}
