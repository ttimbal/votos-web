<?php

namespace App\Http\Controllers;

use App\Core\Business\ReservaBusiness;
use App\Core\Models\Reserva;
use App\Http\Requests\ReservaStoreRequest;
use Illuminate\Http\Request;

class ReservaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $reservaBusiness;

    public function __construct(ReservaBusiness $reservaBusiness)
    {
        $this->reservaBusiness = $reservaBusiness;
    }

    public function index()
    {
        $respuesta = $this->reservaBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.reserva.index',[
                'reservas' => $data['reservas']
            ]);
        }
        return back()->withErrors($respuesta['error']);
        //return view('inventario.reserva.index');
    }

    public function create()
    {
        $respuesta = $this->reservaBusiness->create();
        /**
         * TODO: debe de lazarse un caso de excepcion cuando un docente quiera registrar un prestamo, devido a que la
         * base de datos no soporta que un docentes que registre el prestamo
         */
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            return view('inventario.reserva.create', [
                'instrumentos' => $data['instrumentos'],
                'almacenes' => $data['almacenes'],
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }
    public function store(ReservaStoreRequest $request)
    {
       // return $request;
        $respuesta = $this->reservaBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('reservas.index');
        }
        throw new \Exception('Error: ' . $respuesta['error']);
        return back()->withErrors($respuesta['error']);
    }
    public function show($id)
    {
        $respuesta = $this->reservaBusiness->show($id);
        //return $respuesta;
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
          //  return $data;
//            return view('inventario.prestamo.show');
            return view('inventario.reserva.show', [
                'reserva' => $data['reserva'],
                'docente' => $data['docente'],
                'instrumentos' => $data['instrumentos'],
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    public function destroy($id)
    {
        $respuesta = $this->reservaBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('reservas.index');
        }
        return back()->withErrors($respuesta['error']);
    }

}

