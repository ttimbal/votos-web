<?php

namespace App\Http\Controllers;

use App\Core\Business\PedidoBusiness;
use App\Http\Requests\PedidoStoreRequest;
use App\Http\Requests\PedidoUpdateRequest;

class PedidoController extends Controller
{
    protected $pedidoBusiness;

    public function __construct(PedidoBusiness $pedidoBusiness)
    {
        $this->pedidoBusiness = $pedidoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->pedidoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.pedido.index', [
                'pedidos' => $data['pedidos']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = $this->pedidoBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('compra.pedido.create', [
                'proveedores' => $data['proveedores'],
                'nombreInstrumentos' => $data['nombreInstrumentos']
            ]);
        }
        return back($respuesta['error']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoStoreRequest $request)
    {
        $respuesta = $this->pedidoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('pedidos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function show($numero)
    {
        $respuesta = $this->pedidoBusiness->show($numero);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.pedido.show', [
                'pedido' => $data['pedido'],
                'detalles' => $data['detalles']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function edit($numero)
    {
        $respuesta = $this->pedidoBusiness->edit($numero);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.pedido.edit', [
                'pedido' => $data['pedido'],
                'detalles' => $data['detalles'],
                'proveedores' => $data['proveedores'],
                'nombreInstrumentos' => $data['nombreInstrumentos']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoUpdateRequest $request, $numero)
    {
        $respuesta = $this->pedidoBusiness->update($request, $numero);
        if ($respuesta['success'])
        {
            return redirect()->route('pedidos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $numero
     * @return \Illuminate\Http\Response
     */
    public function destroy($numero)
    {
        $respuesta = $this->pedidoBusiness->destroy($numero);
        if ($respuesta)
        {
            return redirect()->route('pedidos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->pedidoBusiness->index();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function createApi()
    {
        $respuesta = $this->pedidoBusiness->create();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back($respuesta['error']);
    }

    public function storeApi(PedidoStoreRequest $request)
    {
        $respuesta = $this->pedidoBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($numero)
    {
        $respuesta = $this->pedidoBusiness->show($numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($numero)
    {
        $respuesta = $this->pedidoBusiness->edit($numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(PedidoUpdateRequest $request, $numero)
    {
        $respuesta = $this->pedidoBusiness->update($request, $numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($numero)
    {
        $respuesta = $this->pedidoBusiness->destroy($numero);
        if ($respuesta)
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
