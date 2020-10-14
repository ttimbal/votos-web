<?php

namespace App\Http\Controllers;

use App\Core\Business\AsistenciaBusiness;
use App\Http\Requests\AsistenciaStoreRequest;
use App\Http\Requests\AsistenciaUpdateRequest;

class AsistenciaController extends Controller
{
    protected $asistenciaBusiness;

    public function __construct(AsistenciaBusiness $asistenciaBusiness)
    {
        $this->asistenciaBusiness = $asistenciaBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->asistenciaBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.asistencia.index', [
                'asistencias' => $data['asistencias'],
                'administrativos' => $data['administrativos'
                ]]);
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
        $respuesta = $this->asistenciaBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.asistencia.create', [
                'docentes' => $data['docentes'],
                'administrativos' => $data['administrativos']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsistenciaStoreRequest $request)
    {
        $respuesta = $this->asistenciaBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('asistencias.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->asistenciaBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.asistencia.show', [
                'asistencia' => $data['asistencia'],
                'administrativo' => $data['administrativo']
            ]);
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->asistenciaBusiness->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.asistencia.edit', [
                'asistencia' => $data['asistencia'],
                'docentes' => $data['docentes'],
                'administrativos' => $data['administrativos']
            ]);
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
    public function update(AsistenciaUpdateRequest $request, $id)
    {
        $respuesta = $this->asistenciaBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('asistencias.index');
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
        $respuesta = $this->asistenciaBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('asistencias.index');
        }
        return back()->withErrors($respuesta['error']);
    }
}
