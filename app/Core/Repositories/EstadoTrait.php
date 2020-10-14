<?php


namespace App\Core\Repositories;


trait EstadoTrait
{
    /**
     * variables que representan los estados de los instrumentos
     * @var string
     */
    private $RECIEN_FABRICADO = "Recién Fabricado";
    private $CASI_NUEVO = "Casi Nuevo";
    private $ALGO_DESGASTADO = "Algo Desgastado";
    private $BASTANTE_DESGASTADO = "Bastante Desgastado";
    private $DEPLORABLE = "Deplorable";
    private $NO_FUNCIONA = "No Funciona";

    /**
     * metodo que proporciona todos los estados de los instrumentos
     * @return array
     */
    public function getEstados()
    {
        return [
            $this->RECIEN_FABRICADO,
            $this->CASI_NUEVO,
            $this->ALGO_DESGASTADO,
            $this->BASTANTE_DESGASTADO,
            $this->DEPLORABLE,
            $this->NO_FUNCIONA
        ];
    }
}
