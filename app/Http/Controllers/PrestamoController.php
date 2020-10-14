<?php

namespace App\Http\Controllers;

use App\Core\Business\PrestamoBusiness;
use App\Http\Requests\PrestamoStoreRequest;
use App\Http\Requests\PrestamoUpdateRequest;

class PrestamoController extends Controller
{
    protected $prestamoBusiness;

    public function __construct(PrestamoBusiness $prestamoBusiness)
    {
        $this->prestamoBusiness = $prestamoBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->prestamoBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.prestamo.index',[
                'prestamos' => $data['prestamos']
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
        $respuesta = $this->prestamoBusiness->create();
        /**
         * TODO: debe de lazarse un caso de excepcion cuando un docente quiera registrar un prestamo, devido a que la
         * base de datos no soporta que un docentes que registre el prestamo
         */
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('inventario.prestamo.create', [
                'instrumentos' => $data['instrumentos'],
                'estadoInstrumentos' => $data['estadoInstrumentos'],
                'almacenes' => $data['almacenes'],
                'administrativos' => $data['administrativos'],
                'cargoAdministrativos' => $data['cargoAdministrativos'],
                'docentes' => $data['docentes']
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
    public function store(PrestamoStoreRequest $request)
    {
        //return $request;
        $respuesta = $this->prestamoBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('prestamos.index');
        }
        throw new \Exception('Error: ' . $respuesta['error']);
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
        $respuesta = $this->prestamoBusiness->show($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
//            return view('inventario.prestamo.show');
            return view('inventario.prestamo.show', [
                'prestamo' => $data['prestamo'],
                'administrativo' => $data['administrativo'],
                'cliente' => $data['cliente'],
                'instrumentosDelPrestamo' => $data['instrumentosDelPrestamo'],
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
        $respuesta = $this->prestamoBusiness->edit($id);
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('inventario.prestamo.edit', [
                'prestamo' => $data['prestamo'],
                'instrumentosPrestados' => $data['instrumentosPrestados'],
                'todosLosInstrumentosDisponibles' => $data['todosLosInstrumentosDisponibles'],
                'todosLosEstados' => $data['todosLosEstados'],
                'administrativoQueAtiende' => $data['administrativoQueAtiende'],
                'clientePersona' => $data['clientePersona']
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
    public function update(PrestamoUpdateRequest $request, $id)
    {
        $respuesta = $this->prestamoBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return redirect()->route('prestamos.index');
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
        $respuesta = $this->prestamoBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('prestamos.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    public function indexApi()
    {
        $respuesta = $this->prestamoBusiness->index();
        if ($respuesta['success'])
        {
            return $respuesta['data']['prestamos'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function createApi()
    {
        $respuesta = $this->prestamoBusiness->create();
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function storeApi(PrestamoStoreRequest $request)
    {
        $respuesta = $this->prestamoBusiness->store($request);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function showApi($id)
    {
        $respuesta = $this->prestamoBusiness->show($id);
        if ($respuesta['success'])
        {
            return $respuesta['data']['instrumentos'];
        }
        return back()->withErrors($respuesta['error']);
    }

    public function editApi($id)
    {
        $respuesta = $this->prestamoBusiness->edit($id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function updateApi(PrestamoUpdateRequest $request, $id)
    {
        $respuesta = $this->prestamoBusiness->update($request, $id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroyApi($id)
    {
        $respuesta = $this->prestamoBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return $respuesta;
        }
        return back()->withErrors($respuesta['error']);
    }
}
