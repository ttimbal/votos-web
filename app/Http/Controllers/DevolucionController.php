<?php

namespace App\Http\Controllers;

use App\Core\Models\Administrativo;
use App\Core\Models\Devolucion;
use App\Core\Models\Docente;
use App\Core\Models\Instrumento;
use App\Core\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $devoluciones = Devolucion::all();
            $devoluciones->load('persona');
            $devoluciones->load('administrativo_persona');
            //return $devoluciones;
            return view('inventario.devolucion.index', ['devoluciones' => $devoluciones]);
        } catch (\Exception $exception) {
            throw new \Exception('Error: ' . $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $prestamos = Prestamo::all();

            $instrumentos = Instrumento::all();
            $instrumentos->load('nombre');
            $administrativos = Administrativo::all();
            $administrativos->load('persona');
            $docentes = Docente::all();
            $docentes->load('persona');
            $datos = [
                'instrumentos' => $instrumentos,
                'administrativos' => $administrativos,
                'docentes' => $docentes
            ];
            //return $datos;
            return view('inventario.devolucion.create', ['datos' => $datos]);
        } catch (\Exception $exception) {
            throw new \Exception('Error: ' . $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $devolucion = Devolucion::findOrFail($id);
            $devolucion->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('devoluciones.index');
        }
    }

    public function indexApi()
    {
        $devoluciones = Devolucion::all();
        $devoluciones->load('persona');
        $devoluciones->load('administrativo_persona');
        return $devoluciones;
        /* if ($respuesta['success'])
         {
             return $respuesta;
         }
         return back()->withErrors($respuesta['error']);*/

    }
}
