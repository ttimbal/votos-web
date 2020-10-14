<?php


namespace App\Core\Repositories;


interface DiaInterface
{
    const LUNES = 'Lunes';
    const MARTES = 'Martes';
    const MIERCOLES = 'Miercoles';
    const JUEVES = 'Jueves';
    const VIERNES = 'Viernes';
    const SABADO = 'Sabado';
    const DOMINGO = 'Domingo';

    public function getDias();
}
