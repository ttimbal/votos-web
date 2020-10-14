<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * permisos para ver cada paquete
         */

        Permission::create([
            'name' => 'ver paquete inventario'
        ]);

        Permission::create([
            'name' => 'ver paquete servicios ofertados'
        ]);

        Permission::create([
            'name' => 'ver paquete personal'
        ]);

        Permission::create([
            'name' => 'ver paquete compra'
        ]);
//
//        Permission::create([
//            'name' => 'ver paquete usuario'
//        ]);

        /**
         * permisos para ver cada CU
         */

        Permission::create([
            'name' => 'ver cu prestamo'
        ]);

        Permission::create([
            'name' => 'ver cu devolucion'
        ]);
        Permission::create([
            'name' => 'ver cu reserva'
        ]);

        Permission::create([
            'name' => 'ver cu almacen'
        ]);

        Permission::create([
            'name' => 'ver cu instrumento'
        ]);

        Permission::create([
            'name' => 'ver cu promocion'
        ]);

        Permission::create([
            'name' => 'ver cu curso ofertado'
        ]);

        Permission::create([
            'name' => 'ver cu materia'
        ]);

        Permission::create([
            'name' => 'ver cu horario'
        ]);

        Permission::create([
            'name' => 'ver cu periodo'
        ]);

        Permission::create([
            'name' => 'ver cu grupo'
        ]);

        Permission::create([
            'name' => 'ver cu administrativo'
        ]);

        Permission::create([
            'name' => 'ver cu docente'
        ]);

        Permission::create([
            'name' => 'ver cu asistencia'
        ]);

        Permission::create([
            'name' => 'ver cu especialidad'
        ]);

        Permission::create([
            'name' => 'ver cu proveedor'
        ]);

        Permission::create([
            'name' => 'ver cu pedido'
        ]);

        Permission::create([
            'name' => 'ver cu compra'
        ]);

//        Permission::create([
//            'name' => 'ver cu usuario'
//        ]);
//
//        Permission::create([
//            'name' => 'ver cu rol'
//        ]);
//
//        Permission::create([
//            'name' => 'ver cu permiso'
//        ]);

        /**
         * permisos para cada accion de cada CU
         */

        //prestamo
        Permission::create([
            'name' => 'prestamo ver'
        ]);
        Permission::create([
            'name' => 'prestamo crear'
        ]);
        Permission::create([
            'name' => 'prestamo editar'
        ]);
        Permission::create([
            'name' => 'prestamo eliminar'
        ]);

        //devolucion
        Permission::create([
            'name' => 'devolucion ver'
        ]);
        Permission::create([
            'name' => 'devolucion crear'
        ]);
        Permission::create([
            'name' => 'devolucion editar'
        ]);
        Permission::create([
            'name' => 'devolucion eliminar'
        ]);

        //almacen
        Permission::create([
            'name' => 'almacen ver'
        ]);
        Permission::create([
            'name' => 'almacen crear'
        ]);
        Permission::create([
            'name' => 'almacen editar'
        ]);
        Permission::create([
            'name' => 'almacen eliminar'
        ]);

        //instrumento
        Permission::create([
            'name' => 'instrumento ver'
        ]);
        Permission::create([
            'name' => 'instrumento crear'
        ]);
        Permission::create([
            'name' => 'instrumento editar'
        ]);
        Permission::create([
            'name' => 'instrumento eliminar'
        ]);

        //reporte de exitencias                  --falta implementar
        Permission::create([
            'name' => 'reporte existencia'
        ]);

        //promocion
        Permission::create([
            'name' => 'promocion ver'
        ]);
        Permission::create([
            'name' => 'promocion crear'
        ]);
        Permission::create([
            'name' => 'promocion editar'
        ]);
        Permission::create([
            'name' => 'promocion eliminar'
        ]);

        //curso
        Permission::create([
            'name' => 'curso ver'
        ]);
        Permission::create([
            'name' => 'curso crear'
        ]);
        Permission::create([
            'name' => 'curso editar'
        ]);
        Permission::create([
            'name' => 'curso eliminar'
        ]);

        //materia
        Permission::create([
            'name' => 'materia ver'
        ]);
        Permission::create([
            'name' => 'materia crear'
        ]);
        Permission::create([
            'name' => 'materia editar'
        ]);
        Permission::create([
            'name' => 'materia eliminar'
        ]);

        //horario
        Permission::create([
            'name' => 'horario ver'
        ]);
        Permission::create([
            'name' => 'horario crear'
        ]);
        Permission::create([
            'name' => 'horario editar'
        ]);
        Permission::create([
            'name' => 'horario eliminar'
        ]);

        //periodo
        Permission::create([
            'name' => 'periodo ver'
        ]);
        Permission::create([
            'name' => 'periodo crear'
        ]);
        Permission::create([
            'name' => 'periodo editar'
        ]);
        Permission::create([
            'name' => 'periodo eliminar'
        ]);

        //grupo
        Permission::create([
            'name' => 'grupo ver'
        ]);
        Permission::create([
            'name' => 'grupo crear'
        ]);
        Permission::create([
            'name' => 'grupo editar'
        ]);
        Permission::create([
            'name' => 'grupo eliminar'
        ]);

        //administrativo
        Permission::create([
            'name' => 'administrativo ver'
        ]);
        Permission::create([
            'name' => 'administrativo crear'
        ]);
        Permission::create([
            'name' => 'administrativo editar'
        ]);
        Permission::create([
            'name' => 'administrativo eliminar'
        ]);

        //docente
        Permission::create([
            'name' => 'docente ver'
        ]);
        Permission::create([
            'name' => 'docente crear'
        ]);
        Permission::create([
            'name' => 'docente editar'
        ]);
        Permission::create([
            'name' => 'docente eliminar'
        ]);

        //asistencia
        Permission::create([
            'name' => 'asistencia ver'
        ]);
        Permission::create([
            'name' => 'asistencia crear'
        ]);
        Permission::create([
            'name' => 'asistencia editar'
        ]);
        Permission::create([
            'name' => 'asistencia eliminar'
        ]);

        //especialidad
        Permission::create([
            'name' => 'especialidad ver'
        ]);
        Permission::create([
            'name' => 'especialidad crear'
        ]);
        Permission::create([
            'name' => 'especialidad editar'
        ]);
        Permission::create([
            'name' => 'especialidad eliminar'
        ]);

        //proveedor
        Permission::create([
            'name' => 'proveedor ver'
        ]);
        Permission::create([
            'name' => 'proveedor crear'
        ]);
        Permission::create([
            'name' => 'proveedor editar'
        ]);
        Permission::create([
            'name' => 'proveedor eliminar'
        ]);

        //pedido
        Permission::create([
            'name' => 'pedido ver'
        ]);
        Permission::create([
            'name' => 'pedido crear'
        ]);
        Permission::create([
            'name' => 'pedido editar'
        ]);
        Permission::create([
            'name' => 'pedido eliminar'
        ]);

        //compra
        Permission::create([
            'name' => 'compra ver'
        ]);
        Permission::create([
            'name' => 'compra crear'
        ]);
        Permission::create([
            'name' => 'compra editar'
        ]);
        Permission::create([
            'name' => 'compra eliminar'
        ]);

//        //usuario
//        Permission::create([
//            'name' => 'usuario ver'
//        ]);
//        Permission::create([
//            'name' => 'usuario crear'
//        ]);
//        Permission::create([
//            'name' => 'usuario editar'
//        ]);
//        Permission::create([
//            'name' => 'usuario eliminar'
//        ]);
//
//        //rol
//        Permission::create([
//            'name' => 'rol ver'
//        ]);
//        Permission::create([
//            'name' => 'rol crear'
//        ]);
//        Permission::create([
//            'name' => 'rol editar'
//        ]);
//        Permission::create([
//            'name' => 'rol eliminar'
//        ]);
//
//        //permiso
//        Permission::create([
//            'name' => 'permiso ver'
//        ]);
//        Permission::create([
//            'name' => 'permiso crear'
//        ]);
//        Permission::create([
//            'name' => 'permiso editar'
//        ]);
//        Permission::create([
//            'name' => 'permiso eliminar'
//        ]);
    }
}
