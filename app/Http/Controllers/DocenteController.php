<?php

namespace App\Http\Controllers;

use App\Core\Business\DocenteBusiness;
use App\Core\Models\Afinidad;
use App\Http\Requests\DocenteStoreRequest;
use App\Http\Requests\DocenteUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    protected $docenteBusiness;

    public function __construct(DocenteBusiness $docenteBusiness)
    {
        $this->docenteBusiness = $docenteBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->docenteBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
//            dd($data);
            return view('personal.docente.index', ['docentes' => $data['docentes']]);
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
        $respuesta = $this->docenteBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('personal.docente.create', ['especialidades' => $data['especialidades']]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteStoreRequest $request)
    {
        $respuesta = $this->docenteBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('docentes.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $persona_id
     * @return \Illuminate\Http\Response
     */
    public function show($persona_id)
    {
        $respuesta = $this->docenteBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('personal.docente.show', ['docente' => $data['docente']]);
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $persona_id
     * @return \Illuminate\Http\Response
     */
    public function edit($persona_id)
    {
        $respuesta = $this->docenteBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('personal.docente.edit', [
                'docente' => $data['docente'],
                'especialidades' => $data['especialidades']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $persona_id
     * @return \Illuminate\Http\Response
     */
    public function update(DocenteUpdateRequest $request, $persona_id)
    {
        $respuesta = $this->docenteBusiness->update($request, $persona_id);
        if ($respuesta['success'])
        {
            return redirect()->route('docentes.index');
        }
        //throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $persona_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona_id)
    {
        $respuesta = $this->docenteBusiness->destroy($persona_id);
        if ($respuesta['success'])
        {
            return redirect()->route('docentes.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /*
     * Funciones para la api
     * */

    public function index_api()
    {
        $respuesta = $this->docenteBusiness->indexApi();
        if ($respuesta['success']){
            //$data['pages']=$respuesta['data']['docentes']->lastPage();
            // $data['current_page']=$respuesta['data']['docentes']->currentPage();
            //$data['morePages']=$respuesta['data']['docentes']->hasMorePages();
            // $data['docentes']=$respuesta['data']['docentes']->items();
            $data=$respuesta['data']['docentes'];
            foreach ($data as $docente){
                $persona=$docente['persona'];
                unset($docente['persona']);
                $docente['nombre']=$persona['nombre'];
                $docente['direccion']=$persona['direccion'];
                $docente['activo']=$persona['activo'];
                $docente['correo']=$persona['correo'];
                $docente['ci_nit']=$persona['ci_nit'];
            }
            return $data;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function create_api()
    {
        $respuesta = $this->docenteBusiness->create();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function store_api(Request $request)
    {
        $respuesta = $this->docenteBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function show_api($persona_id)
    {
        $respuesta = $this->docenteBusiness->show($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function edit_api($persona_id)
    {
        $respuesta = $this->docenteBusiness->edit($persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function update_api(Request $request, $persona_id)
    {
        $respuesta = $this->docenteBusiness->update($request, $persona_id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroy_api($persona_id)
    {
        $respuesta = $this->docenteBusiness->destroy();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
