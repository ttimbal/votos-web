<?php

namespace App\Http\Controllers;

use App\Core\Business\RolBusiness;
use Illuminate\Http\Request;

class RolController extends Controller
{
    protected $rolBusiness;

    public function __construct(RolBusiness $rolBusiness)
    {
        $this->rolBusiness = $rolBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->rolBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.rol.index', ['roles' => $data['roles']]);
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
        $respuesta = $this->rolBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.rol.create', ['todosLosPermisos' => $data['todosLosPermisos']]);
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
        $respuesta = $this->rolBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('roles.index');
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
        $respuesta = $this->rolBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.rol.show', [
                'rol' => $data['rol'],
                'usuarios' => $data['usuarios']
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
        $respuesta = $this->rolBusiness->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.rol.edit', [
                'rol' => $data['rol'],
                'todosLosPermisos' => $data['todosLosPermisos'],
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
        $respuesta = $this->rolBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('roles.index');
        }
        throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->rolBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('roles.index');
        }
        return back()->withErrors($respuesta['error']);
    }
}
