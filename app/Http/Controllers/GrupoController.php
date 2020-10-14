<?php

namespace App\Http\Controllers;

use App\Core\Business\GrupoBusiness;
use App\Http\Requests\GrupoStoreRequest;
use App\Http\Requests\GrupoUpdateRequest;

class GrupoController extends Controller
{
    protected $grupoBusiness;

    public function __construct(GrupoBusiness $grupoBusiness)
    {
        $this->grupoBusiness = $grupoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->grupoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.grupo.index', ['grupos' => $data['grupos']]);
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
        $respuesta = $this->grupoBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.grupo.create', [
                'materias' => $data['materias'],
                'docentes' => $data['docentes'],
                'horarios' => $data['horarios'],
                'periodos' => $data['periodos']
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
    public function store(GrupoStoreRequest $request)
    {
        //return $request;
        $respuesta = $this->grupoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('grupos.index');
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
        $respuesta = $this->grupoBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.grupo.show', [
                'grupo' => $data['grupo'],
                'docente' => $data['docente'],
                'materia' => $data['materia'],
                'periodo' => $data['periodo'],
                'horarios' => $data['horarios']
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
        $respuesta = $this->grupoBusiness->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.grupo.edit', [
                'grupo' => $data['grupo'],
                'docentes' => $data['docentes'],
                'materias' => $data['materias'],
                'periodos' => $data['periodos'],
                'horarios' => $data['horarios'],
                'grupo_horarios' => $data['grupo_horarios']
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
    public function update(GrupoUpdateRequest $request, $id)
    {
        $respuesta = $this->grupoBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('grupos.index');
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
        $respuesta = $this->grupoBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('grupos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function index_api($sigla)
    {
        $respuesta = $this->grupoBusiness->indexApi($sigla);
        if ($respuesta['success']){
            $grupos=$respuesta['data']['grupos'];
            foreach ($grupos as $grupo){
                unset($grupo['materia_sigla']);
                unset($grupo['docente_id']);
                unset($grupo['periodo_codigo']);
            }

            return $grupos;
        }
        return back()->withErrors($respuesta['error']);
    }
}
