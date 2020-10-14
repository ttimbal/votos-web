<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = Role::findByName('Docente');

        /**
         * primero se le asignan los permisos para las acciones que pueda realizar dentro de cada caso de
         * uso (ver,crear,editar y eliminar), luego los permisos de acceso para cada caso de uso y por ultimo
         * los permisos de acceso a los paquetes que contienen casos de uso
         */
        $rol->givePermissionTo([
            'almacen ver',
            'grupo ver',
            'ver cu almacen',
            'ver cu grupo',
            'ver paquete inventario',
            'ver paquete servicios ofertados',
            'ver cu reserva'
        ]);

        $rol = Role::findByName('Secretaria');

        /**
         * primero se le asignan los permisos para las acciones que pueda realizar dentro de cada caso de
         * uso (ver,crear,editar y eliminar), luego los permisos de acceso para cada caso de uso y por ultimo
         * los permisos de acceso a los paquetes que contienen casos de uso
         */
        $rol->givePermissionTo([
            'administrativo ver',
            'administrativo crear',
            'administrativo editar',
            'administrativo eliminar',
            'docente ver',
            'docente crear',
            'docente editar',
            'docente eliminar',
            'asistencia ver',
            'asistencia crear',
            'asistencia editar',
            'asistencia eliminar',
            'especialidad ver',
            'especialidad crear',
            'especialidad editar',
            'especialidad eliminar',
            'ver cu administrativo',
            'ver cu docente',
            'ver cu asistencia',
            'ver cu especialidad',
            'ver paquete personal'
        ]);

        $rol = Role::findByName('Encargado Almacen');

        /**
         * primero se le asignan los permisos para las acciones que pueda realizar dentro de cada caso de
         * uso (ver,crear,editar y eliminar), luego los permisos de acceso para cada caso de uso y por ultimo
         * los permisos de acceso a los paquetes que contienen casos de uso
         */
        $rol->givePermissionTo([
            'prestamo ver',
            'prestamo crear',
            'prestamo editar',
            'prestamo eliminar',
            'devolucion ver',
            'devolucion crear',
            'devolucion eliminar',
            'almacen ver',
            'instrumento ver',
            'ver cu prestamo',
            'ver cu devolucion',
            'ver cu almacen',
            'ver cu instrumento',
            'ver paquete inventario'
        ]);

        $rol = Role::findByName('Encargado Finanzas');

        /**
         * primero se le asignan los permisos para las acciones que pueda realizar dentro de cada caso de
         * uso (ver,crear,editar y eliminar), luego los permisos de acceso para cada caso de uso y por ultimo
         * los permisos de acceso a los paquetes que contienen casos de uso
         */
        $rol->givePermissionTo([
            'reporte existencia',
            'promocion ver',
            'curso ver',
            'materia ver',
            'asistencia ver',
            'pedido ver',
            'compra ver',
            'ver cu promocion',
            'ver cu curso ofertado',
            'ver cu materia',
            'ver cu asistencia',
            'ver cu pedido',
            'ver cu compra',
            'ver paquete servicios ofertados',
            'ver paquete personal',
            'ver paquete compra'
        ]);
    }
}
