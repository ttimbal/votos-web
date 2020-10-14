<?php


namespace App\Core\Repositories;


use App\Core\Models\DetallePrestamo;
use App\Core\Models\Instrumento;
use Illuminate\Support\Facades\DB;

class DetallePrestamoRepository
{
    //traits
    use EstadoTrait;

    /**
     * metodo para guardar todos los detalles de prestamos
     * Precondicion:se debera de enviar el id del prestamo
     * @param $data
     */
    public function store($data)
    {;
        foreach ($data['instrumentos_id'] as $instrumento_id)
        {
            $detalle = new DetallePrestamo(); //TODO: tambien se deberia cambiar el estado del instrumento, con un boolean que diga prestado o algo asi
            $detalle->prestamo_id = $data['id'];
            $detalle->instrumento_numero = $instrumento_id;
            $instrumento=Instrumento::find($instrumento_id);
            $detalle->estado =$instrumento->estado;
            $detalle->save();
        }
    }

    public function update($data, $id)
    {
        $instrumentos_numero = $data['instrumentos_numero'];
        $estadosInstrumentos = $data['estados'];
        $this->deleteAll($id);
        for ($contador = 0; $contador < sizeof($instrumentos_numero); $contador++)
        {
            $detalle = new DetallePrestamo();
            $detalle->prestamo_id = $id;
            $detalle->instrumento_numero = $instrumentos_numero[$contador];
            $detalle->estado = $estadosInstrumentos[$contador];
            $detalle->save();
        }
    }

    /**
     * metodo que elimina todos los instrumentos que le pertenecen a ese id de prestamo
     * @param $prestamo_id
     */
    public function deleteAll($prestamo_id)
    {
        return DB::select("call borrar_detalle_prestamo(?)",array($prestamo_id));
       /* DB::table('detalle_prestamos')
            ->where('prestamo_id',$prestamo_id)
            ->delete();*/
    }

    /**
     * metodo que retorna todos los id de los instrumentos(en un array con indice numerico) de un determinado
     * prestamo
     * Precondicion.- se le debe de mandar el id del prestamo
     * @param $prestamoId
     * @return array
     */
    public function getTodosLosNumerosDeInstrumentosDeUnPrestamo($prestamoId)
    {
        $instrumentosNumeros = DetallePrestamo::select('instrumento_numero')
            ->where('detalle_prestamos.prestamo_id', $prestamoId)
            ->get();
        $arrayDeNumerosDeInstrumentos = [];
        foreach ($instrumentosNumeros as $instrumentosNumero)
        {
            $arrayDeNumerosDeInstrumentos[] = $instrumentosNumero['instrumento_numero'];
        }
        return $arrayDeNumerosDeInstrumentos;
    }

    /**
     * metodo que recibe el id del prestamo y retorna todos los instrumentos de dicho
     * prestamo, tomando en cuenta el estado de los instrumentos al momento de haber hecho el prestamo
     * @param $prestamoId
     * @return mixed
     */
    public function getInstrumentosDeUnPrestamo($prestamoId)
    {
        return DetallePrestamo::select('instrumentos.numero', 'detalle_prestamos.estado', 'nombre_instrumentos.nombre')
            ->where('detalle_prestamos.prestamo_id', $prestamoId)
            ->join('instrumentos', 'detalle_prestamos.instrumento_numero', '=', 'instrumentos.numero')
            ->join('nombre_instrumentos', 'instrumentos.nombre_instrumento_id', '=', 'nombre_instrumentos.id')
            ->get();
    }
}
