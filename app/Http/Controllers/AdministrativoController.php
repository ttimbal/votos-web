<?php

namespace App\Http\Controllers;

use App\Core\Business\AdministrativoBusiness;
use App\Http\Requests\AdministrativoStoreRequest;
use App\Http\Requests\AdministrativoUpdateRequest;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    protected $administrativoBusiness;

    public function __construct(AdministrativoBusiness $administrativoBusiness)
    {
        $this->administrativoBusiness = $administrativoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->administrativoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.administrativo.index', [
                'administrativos' => $data['administrativos']
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
        $respuesta = $this->administrativoBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('personal.administrativo.create', [
                'cargos' => $data['cargos']
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
    public function store(AdministrativoStoreRequest $request)
    {
        $respuesta = $this->administrativoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('administrativos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function show($persona_id)
    {
        $respuesta = $this->administrativoBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.administrativo.show', [
                'administrativo' => $data['administrativo']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function edit($persona_id)
    {
        $respuesta = $this->administrativoBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.administrativo.edit', [
                'administrativo' => $data['administrativo'],
                'cargos' => $data['cargos']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministrativoUpdateRequest $request, $persona_id)
    {
        $respuesta = $this->administrativoBusiness->update($request, $persona_id);
        if ($respuesta['success'])
        {
            return redirect()->route('administrativos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $persona_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona_id)
    {
        $respuesta = $this->administrativoBusiness->destroy($persona_id);
        if ($respuesta['success'])
        {
            return redirect()->route('administrativos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function index_api()
    {
        $respuesta = $this->administrativoBusiness->index();
        if ($respuesta['success'])
        {
            foreach ($respuesta['data']['administrativos'] as $administrativo){
                $persona=$administrativo['persona'];
                unset($administrativo['persona']);
                $administrativo['nombre']=$persona['nombre'];
                $administrativo['direccion']=$persona['direccion'];
                $administrativo['activo']=$persona['activo'];
                $administrativo['correo']=$persona['correo'];
                $administrativo['ci_nit']=$persona['ci_nit'];
            }
            return $respuesta['data']['administrativos'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function create_api()
    {
        $respuesta = $this->administrativoBusiness->create();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function store_api(Request $request)
    {
        $respuesta = $this->administrativoBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function show_api($persona_id)
    {
        $respuesta = $this->administrativoBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function edit_api($persona_id)
    {
        $respuesta = $this->administrativoBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function update_api(Request $request, $persona_id)
    {
        $respuesta = $this->administrativoBusiness->update($request, $persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroy_api($persona_id)
    {
        $respuesta = $this->administrativoBusiness->destroy($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
