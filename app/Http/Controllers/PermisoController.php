<?php

namespace App\Http\Controllers;

use App\Core\Business\PermisoBussines;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    protected $permisoBussines;

    public function __construct(PermisoBussines $permisoBussines)
    {
        $this->permisoBussines = $permisoBussines;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->permisoBussines->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.permiso.index', ['permisos' => $data['permisos']]);
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
        $respuesta = $this->permisoBussines->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('usuario.permiso.create', [
                'todosLosRoles' => $data['todosLosRoles']
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
    public function store(Request $request)
    {
//        return $request;
        $respuesta = $this->permisoBussines->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('permisos.index');
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
        $respuesta = $this->permisoBussines->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.permiso.show', [
                'permiso' => $data['permiso'],
                'usuarios' => $data['usuarios'],
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
        $respuesta = $this->permisoBussines->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.permiso.edit', [
                'permiso' => $data['permiso'],
                'todosLosRoles' => $data['todosLosRoles']
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
    public function update(Request $request, $id)
    {
//        return $request;
        $respuesta = $this->permisoBussines->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('permisos.index');
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
        $respuesta = $this->permisoBussines->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('permisos.index');
        }
        return back()->withErrors($respuesta['error']);
    }
}
