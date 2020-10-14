<?php

namespace App\Http\Controllers;

use App\Core\Business\AlmacenBusiness;
use App\Http\Requests\AlmacenStoreRequest;
use App\Http\Requests\AlmacenUpdateRequest;

class AlmacenController extends Controller
{
    protected $almacenBusiness;

    public function __construct(AlmacenBusiness $almacenBusiness)
    {
        $this->almacenBusiness = $almacenBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->almacenBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.almacen.index',['almacenes' => $data['almacenes']]);
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
        return view('inventario.almacen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlmacenStoreRequest $request)
    {
        $respuesta = $this->almacenBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('almacenes.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $respuesta = $this->almacenBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.almacen.show',['almacen' => $data['almacen'],'instrumentos' => $data['instrumentos']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $respuesta = $this->almacenBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.almacen.edit',['almacen' => $data['almacen']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(AlmacenUpdateRequest $request, $codigo)
    {
        $respuesta = $this->almacenBusiness->update($request, $codigo);
        if ($respuesta['success'])
        {
            return redirect()->route('almacenes.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $respuesta = $this->almacenBusiness->destroy($codigo);
        if ($respuesta['succes'])
        {
            return redirect()->route('almacenes.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->almacenBusiness->index();
        if ($respuesta['success'])
        {
            return $respuesta['data']['almacenes'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(AlmacenStoreRequest $request)
    {
        $respuesta = $this->almacenBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($codigo)
    {
        $respuesta = $this->almacenBusiness->show($codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($codigo)
    {
        $respuesta = $this->almacenBusiness->show($codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(AlmacenUpdateRequest $request, $codigo)
    {
        $respuesta = $this->almacenBusiness->update($request, $codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($codigo)
    {
        $respuesta = $this->almacenBusiness->destroy($codigo);
        if ($respuesta['succes'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
