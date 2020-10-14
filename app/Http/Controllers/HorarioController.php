<?php

namespace App\Http\Controllers;

use App\Core\Business\HorarioBusiness;
use App\Http\Requests\HorarioStoreRequest;
use App\Http\Requests\HorarioUpdateRequest;

class HorarioController extends Controller
{
    protected $horarioBusiness;

    public function __construct(HorarioBusiness $horarioBusiness)
    {
        $this->horarioBusiness = $horarioBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->horarioBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.horario.index', ['horarios' => $data['horarios']]);
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
        $dias = $this->horarioBusiness->create();
        return view('servicio.horario.create', ['dias' => $dias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioStoreRequest $request)
    {
        $respuesta = $this->horarioBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('horarios.index');
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
        $respuesta = $this->horarioBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.horario.show', ['horario' => $data['horario']]);
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
        $respuesta = $this->horarioBusiness->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.horario.edit', [
                'horario' => $data['horario'],
                'dias' => $data['dias']
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
    public function update(HorarioUpdateRequest $request, $id)
    {
        $respuesta = $this->horarioBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('horarios.index');
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
        $respuesta = $this->horarioBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('horarios.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function index_api()
    {
        $respuesta = $this->horarioBusiness->index();
        if ($respuesta['success']){


            return $respuesta;

        }
        return back()->withErrors($respuesta['error']);
    }
}
