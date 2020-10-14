<?php


namespace App\Core\Repositories;


trait CargoAdministrativoTrait
{
    /**
     * estas variables determinan los cargos de los distintos administrativos
     * del instituto
     * @access private
     * @var string
     */
    private $GERENTE = "Gerente";
    private $SECRETARIA = "Secretaria";
    private $ENCARGADO_DE_FINANZAS = "Encargado de Finanza";
    private $ENCARGADO_DE_ALMACEN = "Encargado de Almacen";

    /**
     * @deprecated
     * @var string
     */
    private $TECNICO_DE_SONIDO = "Tecnico de sonido";

    /**
     * metodo que obtiene todos los cargos de los administrativos
     * @return array
     */
    public function getCargos()
    {
        return [
            $this->GERENTE,
            $this->SECRETARIA,
            $this->ENCARGADO_DE_FINANZAS,
            $this->ENCARGADO_DE_ALMACEN
        ];
    }
}
