<?php

namespace App\Http\Controllers;

use App\Core\Business\CursoBusiness;
use App\Http\Requests\CursoStoreRequest;
use App\Http\Requests\CursoUpdateRequest;

class CursoController extends Controller
{
    protected $cursoBusiness;

    public function __construct(CursoBusiness $cursoBusiness)
    {
        $this->cursoBusiness = $cursoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->cursoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('servicio.curso.index', [
                'cursos' => $data['cursos']
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
        return view('servicio.curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoStoreRequest $request)
    {
        $respuesta = $this->cursoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('cursos.index');
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
        $respuesta = $this->cursoBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.curso.show', [
                'curso' => $data['curso'],
                'materias' => $data['materias']
            ]);
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
        $respuesta = $this->cursoBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('servicio.curso.edit', [
                'curso' => $data['curso']
            ]);
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
    public function update(CursoUpdateRequest $request, $codigo)
    {
        $respuesta = $this->cursoBusiness->update($request, $codigo);
        if ($respuesta['success'])
        {
            return redirect()->route('cursos.index');
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
        $respuesta = $this->cursoBusiness->destroy($codigo);
        if ($respuesta['success'])
        {
            return redirect()->route('cursos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->cursoBusiness->index();
        if ($respuesta['success'])
        {
            return $respuesta['data']['cursos'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(CursoStoreRequest $request)
    {
        $respuesta = $this->cursoBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($codigo)
    {
        $respuesta = $this->cursoBusiness->show($codigo);
        if ($respuesta['success'])
        {
            $curso=$respuesta['data']['curso'];
            $curso['materias']=$respuesta['data']['materias'];
            return $curso;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($codigo)
    {
        $respuesta = $this->cursoBusiness->edit($codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(CursoUpdateRequest $request, $codigo)
    {
        $respuesta = $this->cursoBusiness->update($request, $codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($codigo)
    {
        $respuesta = $this->cursoBusiness->destroy($codigo);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
