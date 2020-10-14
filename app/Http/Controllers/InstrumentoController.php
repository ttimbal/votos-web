<?php

namespace App\Http\Controllers;

use App\Core\Business\InstrumentoBusiness;
use App\Http\Requests\InstrumentoStoreRequest;
use App\Http\Requests\InstrumentoUpdateRequest;

class InstrumentoController extends Controller
{
    protected $instrumentoBusiness;

    public function __construct(InstrumentoBusiness $instrumentoBusiness)
    {
        $this->instrumentoBusiness = $instrumentoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->instrumentoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('inventario.instrumento.index', [
                'instrumentos' => $data['instrumentos'],
                'proveedores' => $data['proveedores']
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
        $respuesta = $this->instrumentoBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('inventario.instrumento.create', [
                'almacenes' => $data['almacenes'],
                'nombre_instrumentos' => $data['nombre_instrumentos'],
                'estados' => $data['estados'], 'compras' => $data['compras'],
                'proveedores' => $data['proveedores']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstrumentoStoreRequest $request)
    {
        //return $request;
        $respuesta = $this->instrumentoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('instrumentos.index');
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
        $respuesta = $this->instrumentoBusiness->show($numero);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('inventario.instrumento.show', [
                'instrumento' => $data['instrumento'],
                'compras' => $data['compras'],
                'proveedores' => $data['proveedores']
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
        $respuesta = $this->instrumentoBusiness->edit($numero);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return $data;
            return view('inventario.instrumento.edit', [
                'instrumento' => $data['instrumento'],
                'nombre_instrumentos' => $data['nombre_instrumentos'],
                'almacenes' => $data['almacenes']
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
    public function update(InstrumentoUpdateRequest $request, $numero)
    {
        $respuesta = $this->instrumentoBusiness->update($request, $numero);
        if ($respuesta['success'])
        {
            return redirect()->route('instrumentos.index');
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
        $respuesta = $this->instrumentoBusiness->destroy($numero);
        if ($respuesta['success'])
        {
            return redirect()->route('instrumentos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->instrumentoBusiness->index();
        if ($respuesta['success'])
        {
            $data=$respuesta['data']['instrumentos'];
            foreach($data as $instrumento) {
                $nombre=$instrumento['nombre_instrumento']['nombre'];
                $instrumento['nombre']=$nombre;
                unset($instrumento['nombre_instrumento']);
                unset($instrumento['compra']);
                unset($instrumento['compra_numero']);
                unset($instrumento['nombre_instrumento_id']);
                unset($instrumento['almacen_codigo']);
            }
            return $data;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function createApi()
    {
        $respuesta = $this->instrumentoBusiness->create();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(InstrumentoStoreRequest $request)
    {
        $respuesta = $this->instrumentoBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($numero)
    {
        $respuesta = $this->instrumentoBusiness->show($numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($numero)
    {
        $respuesta = $this->instrumentoBusiness->edit($numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(InstrumentoUpdateRequest $request, $numero)
    {
        $respuesta = $this->instrumentoBusiness->update($request, $numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($numero)
    {
        $respuesta = $this->instrumentoBusiness->destroy($numero);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
