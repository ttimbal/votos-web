<?php

namespace App\Http\Controllers;

use App\Core\Business\PromocionBusiness;
use App\Http\Requests\PromocionStoreRequest;
use App\Http\Requests\PromocionUpdateRequest;

class PromocionController extends Controller
{
    protected $promocionBusiness;

    public function __construct(PromocionBusiness $promocionBusiness)
    {
        $this->promocionBusiness = $promocionBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->promocionBusiness->index();
        if($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.promocion.index', ['promociones' => $data['promociones']]);
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
        return view('servicio.promocion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromocionStoreRequest $request)
    {
        $respuesta = $this->promocionBusiness->store($request);
        if($respuesta['success'])
        {
            return redirect()->route('promociones.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta = $this->promocionBusiness->show($id);
        if($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.promocion.show', ['promocion' => $data['promocion']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = $this->promocionBusiness->show($id);
        if($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.promocion.edit', ['promocion' => $data['promocion']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromocionUpdateRequest $request, $id)
    {
        $respuesta = $this->promocionBusiness->update($request, $id);
        if($respuesta['success'])
        {
            return redirect()->route('promociones.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuesta = $this->promocionBusiness->destroy($id);
        if($respuesta['success'])
        {
            return redirect()->route('promociones.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->promocionBusiness->index();
        if($respuesta['success'])
        {
            return $respuesta['data']['promociones'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(PromocionStoreRequest $request)
    {
        $respuesta = $this->promocionBusiness->store($request);
        if($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($id)
    {
        $respuesta = $this->promocionBusiness->show($id);
        if($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($id)
    {
        $respuesta = $this->promocionBusiness->show($id);
        if($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(PromocionUpdateRequest $request, $id)
    {
        $respuesta = $this->promocionBusiness->update($request, $id);
        if($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($id)
    {
        $respuesta = $this->promocionBusiness->destroy($id);
        if($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
