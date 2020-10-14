<?php

namespace App\Http\Controllers;

use App\Core\Business\MateriaBusiness;
use App\Http\Requests\MateriaStoreRequest;
use App\Http\Requests\MateriaUpdateRequest;

class MateriaController extends Controller
{
    protected $materiaBusiness;

    public function __construct(MateriaBusiness $materiaBusiness)
    {
        $this->materiaBusiness = $materiaBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->materiaBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.materia.index', [
                'materias' => $data['materias']
            ]);
        }
        throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = $this->materiaBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.materia.create', [
                'cursos' => $data['cursos'],
                'promociones' => $data['promociones']
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
    public function store(MateriaStoreRequest $request)
    {
        //return $request;
        $respuesta = $this->materiaBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('materias.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $sigla
     * @return \Illuminate\Http\Response
     */
    public function show($sigla)
    {
        $respuesta = $this->materiaBusiness->show($sigla);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.materia.show', [
                'materia' => $data['materia'],
                'promociones' => $data['promociones'],
                'cursos' => $data['cursos']
            ]);
        }
        throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $sigla
     * @return \Illuminate\Http\Response
     */
    public function edit($sigla)
    {
        $respuesta = $this->materiaBusiness->edit($sigla);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('servicio.materia.edit', [
                'materia' => $data['materia'],
                'carreras_materia' => $data['carreras_materia'],
                'promociones_materia' => $data['promociones_materia'],
                'cursos' => $data['cursos'],
                'promociones' => $data['promociones']
            ]);
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sigla
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaUpdateRequest $request, $sigla)
    {
        //return $request;
        $respuesta = $this->materiaBusiness->update($request, $sigla);
        if ($respuesta['success'])
        {
            return redirect()->route('materias.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sigla
     * @return \Illuminate\Http\Response
     */
    public function destroy($sigla)
    {
        $respuesta = $this->materiaBusiness->destroy($sigla);
        if ($respuesta['success'])
        {
            return redirect()->route('materias.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function index_api()
    {
        $respuesta = $this->materiaBusiness->index();
        if ($respuesta['success'])
        {
            /*foreach ($respuesta['data']['administrativos'] as $administrativo){
                $persona=$administrativo['persona'];
                unset($administrativo['persona']);
                $administrativo['nombre']=$persona['nombre'];
                $administrativo['direccion']=$persona['direccion'];
                $administrativo['activo']=$persona['activo'];
                $administrativo['correo']=$persona['correo'];
                $administrativo['ci_nit']=$persona['ci_nit'];
            } */
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
