<?php

namespace App\Http\Controllers;

use App\Core\Business\EspecialidadBusiness;
use App\Http\Requests\EspecialidadStoreRequest;
use App\Http\Requests\EspecialidadUpdateRequest;

class EspecialidadController extends Controller
{
    protected $especialidadBusiness;

    public function __construct(EspecialidadBusiness $especialidadBusiness)
    {
        $this->especialidadBusiness = $especialidadBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->especialidadBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.especialidad.index', [
                'especialidades' => $data['especialidades']
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
        return view('personal.especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadStoreRequest $request)
    {
        $respuesta = $this->especialidadBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('especialidades.index');
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
        $respuesta = $this->especialidadBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.especialidad.show', [
                'especialidad' => $data['especialidad']
            ]);
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
        $respuesta = $this->especialidadBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.especialidad.edit', ['especialidad' => $data['especialidad']]);
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
    public function update(EspecialidadUpdateRequest $request, $id)
    {
        $respuesta = $this->especialidadBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('especialidades.index');
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
        $respuesta = $this->especialidadBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('especialidades.index');
        }
        return back()->withErrors($respuesta['error']);
    }
}
