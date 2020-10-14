<?php

namespace App\Http\Controllers;

use App\Core\Business\PeriodoBusiness;
use App\Http\Requests\PeriodoStoreRequest;
use App\Http\Requests\PeriodoUpdateRequest;

class PeriodoController extends Controller
{
    protected $periodoBusiness;

    public function __construct(PeriodoBusiness $periodoBusiness)
    {
        $this->periodoBusiness = $periodoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->periodoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('servicio.periodo.index', ['periodos' => $data['periodos']]);
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
        return view('servicio.periodo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodoStoreRequest $request)
    {
        $respuesta = $this->periodoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('periodos.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->periodoBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('servicio.periodo.show', ['periodo' => $data['periodo']]);
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->periodoBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('servicio.periodo.edit', ['periodo' => $data['periodo']]);
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodoUpdateRequest $request, $codigo)
    {
        $respuesta = $this->periodoBusiness->update($request, $codigo);
        if ($respuesta['success'])
        {
            return redirect()->route('periodos.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->periodoBusiness->destroy($codigo);
        if ($respuesta['success'])
        {
            return redirect()->route('periodos.index');
        }
        throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }
}
