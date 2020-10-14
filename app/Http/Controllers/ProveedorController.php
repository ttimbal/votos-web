<?php

namespace App\Http\Controllers;

use App\Core\Business\ProveedorBusiness;
use App\Http\Requests\ProveedorStoreRequest;
use App\Http\Requests\ProveedorUpdateRequest;

class ProveedorController extends Controller
{
    protected $proveedorBusiness;

    public function __construct(ProveedorBusiness $proveedorBusiness)
    {
        $this->proveedorBusiness = $proveedorBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->proveedorBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.proveedor.index',['proveedores' => $data['proveedores']]);
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
        return view('compra.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorStoreRequest $request)
    {
        $respuesta = $this->proveedorBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('proveedores.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function show($persona_id)
    {
        $respuesta = $this->proveedorBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.proveedor.show', ['proveedor' => $data['proveedor']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function edit($persona_id)
    {
        $respuesta = $this->proveedorBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('compra.proveedor.edit', ['proveedor' => $data['proveedor']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorUpdateRequest $request, $persona_id)
    {
        $resuesta = $this->proveedorBusiness->update($request, $persona_id);
        if ($resuesta['success'])
        {
            return redirect()->route('proveedores.index');
        }
        return back()->withErrors($resuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona_id)
    {
        $respuesta = $this->proveedorBusiness->destroy($persona_id);
        if ($respuesta['success'])
        {
            return redirect()->route('proveedores.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->proveedorBusiness->index();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(ProveedorStoreRequest $request)
    {
        $respuesta = $this->proveedorBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($persona_id)
    {
        $respuesta = $this->proveedorBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($persona_id)
    {
        $respuesta = $this->proveedorBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(ProveedorUpdateRequest $request, $persona_id)
    {
        $resuesta = $this->proveedorBusiness->update($request, $persona_id);
        if ($resuesta['success'])
        {
            return $resuesta;
        }
        return back()->withErrors($resuesta['error']);
    }

    public function destroyApi($persona_id)
    {
        $respuesta = $this->proveedorBusiness->destroy($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

}
