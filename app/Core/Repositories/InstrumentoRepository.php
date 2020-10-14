<?php


namespace App\Core\Repositories;


use App\Core\Models\Instrumento;
use Illuminate\Support\Facades\DB;

class InstrumentoRepository
{

    //traits
    use EstadoTrait;

    /**
     * metodo que retorna todos los instrumentos
     * @return Instrumento[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Instrumento::all();
    }

    /**
     * metodo que retorna todos los instrumentos disponibles
     * @return mixed
     */
    public function allAvailabre()
    {
        return Instrumento::select('numero','nombre','estado','precio','almacen_codigo')
            ->where('disponibilidad','D')
            ->join('nombre_instrumentos','instrumentos.nombre_instrumento_id','=','nombre_instrumentos.id')
            ->orderBy('nombre')
            ->get();
    }
    public function getAllAvailables()
    {
        return Instrumento::select('numero','nombre','estado','precio','almacen_codigo')
            ->where('disponibilidad','D')
            ->join('nombre_instrumentos','instrumentos.nombre_instrumento_id','=','nombre_instrumentos.id')
            ->orderBy('nombre')
            ->get();
    }

    /**
     * metodo para buscar un instrumento especifico
     * @param $numero
     * @return mixed
     */
    public function find($numero)
    {
        return Instrumento::findOrFail($numero);
    }

    public function index()
    {
        $instrumentos = $this->all();
        $instrumentos->load('nombre_instrumento');
        $instrumentos->load('almacen');
        $instrumentos->load('compra');
        return $instrumentos;
    }

    /**
     * metodo para guardar un nuevo instrumento
     * @param $data
     * @return Instrumento una instancia del instrumento creado
     */
    public function store($data)
    {
        $instrumento = new Instrumento();
        $instrumento->estado = $data['estado'];
        $instrumento->precio = $data['precio'];
        if (empty($data['disponibilidad']))
        {
            $instrumento->disponibilidad = false;
        } else {
            $instrumento->disponibilidad = true;
        }
        $instrumento->almacen_codigo = $data['almacen_codigo'];
        $instrumento->nombre_instrumento_id = $data['nombreInstrumento_id'];
        $instrumento->compra_numero = $data['compra_numero'];
        $instrumento->save();
        return $instrumento;
    }

    public function show($numero)
    {
        $instrumento = $this->find($numero);
        $instrumento->load('nombre_instrumento');
        $instrumento->load('almacen');
        return $instrumento;
    }
    public static function InstrumestsByAlmacen($codigoAlmacen)
    {

        /*return DB::table('instrumentos')
            ->join('nombre_instrumentos','instrumentos.nombre_instrumento_id','=','nombre_instrumentos.id')
            ->join('almacenes', 'almacenes.codigo', '=', 'almacen_codigo')
            ->where('disponibilidad',true)
            ->select('numero','nombre_instrumentos.nombre','estado','precio','almacen_codigo')

            ->get();*/
        $codigo=(int)$codigoAlmacen;
        echo $codigoAlmacen;
        return Instrumento::select('numero','nombre_instrumentos.nombre','estado','precio','almacen_codigo')
            ->where('disponibilidad','D')
            ->join('nombre_instrumentos','instrumentos.nombre_instrumento_id','=','nombre_instrumentos.id')
            ->join('almacenes', 'almacenes.codigo', '=', 'almacen_codigo')
            ->where('almacenes.codigo',3)
            ->orderBy('nombre')

            ->get();
    }
    public function update($data, $numero)
    {
        $instrumento = $this->find($numero);
        $instrumento->almacen_codigo = $data['almacen_codigo'];
        $instrumento->nombre_instrumento_id = $data['nombreInstrumento_id'];
        $instrumento->save();
        return $instrumento;
    }

    public function destroy($numero)
    {
        Instrumento::destroy($numero);
    }

    /**
     * metodo que recibe los id de los instrumentos(en un array con indice numerico) para que cambie su
     * disponibilidad a false, haciendor referencia a que ya fueron reservados
     * @param $data
     */
    public function reservarInstrumenos($data)
    {
        $arregloDeIdDeInstrumentos = $data['instrumentos_id'];
        foreach ($arregloDeIdDeInstrumentos as $instrumentoId)
        {
            $instrumento = Instrumento::findOrFail($instrumentoId);
            $instrumento->disponibilidad = false;
            $instrumento->save();
        }
    }

    /**
     * metood que recibe los id de los instrumenos(en un array con indice numerico) para que cambie su
     * disponibilidad a true, haciendo referencia a que los instrumentos ya estan disponibles
     * @param $data
     */
    public function devolverInstrumentos($data)
    {
        $arregloDeIdDeInstrumentos = $data['instrumentos_id'];
        foreach ($arregloDeIdDeInstrumentos as $instrumentoId)
        {
            $instrumento = Instrumento::findOrFail($instrumentoId);
            $instrumento->disponibilidad = true;
            $instrumento->save();
        }
    }

    /**
     * metodo que recibe todos los id de instrumentos(en un array con indice numerico) y devuelve
     * todos los instrumentos que coincidan con esos numeros
     * @param \ArrayObject $arrayNumerosDeInstrumentos
     */
    public function getIntrumentos($arrayNumerosDeInstrumentos)
    {
        return Instrumento::select('numero','nombre','estado','precio','almacen_codigo')
            ->whereIn('instrumentos.numero', $arrayNumerosDeInstrumentos)
            ->join('nombre_instrumentos','instrumentos.nombre_instrumento_id','=','nombre_instrumentos.id')
            ->orderBy('numero')
            ->get();
    }
}
