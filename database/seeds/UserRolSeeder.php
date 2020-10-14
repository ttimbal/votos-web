<?php

use App\Core\Models\Docente;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user =  User::findOrFail(1);
//        $user->assignRole(['Administrador', 'Administrativo', 'Docente']);
//        $user =  User::findOrFail(2);
//        $user->assignRole(['Administrador', 'Administrativo']);
//
//        $usuariosID = User::all(['id']);
//
//        $arrayOfIdUsers = [];
//
//        foreach ($usuariosID as $tupla)
//        {
//            array_push($arrayOfIdUsers, $tupla->id);
//        }

        //docentes
//        $docentesID = Docente::all();
//        $arrayDeIDDocentes = [];
//        foreach ($docentesID as $docenteID)
//        {
//            array_push($arrayDeIDDocentes, $docenteID->id);
//        }
//
//        $docentesRegistrados = User::find($arrayDeIDDocentes);
//
//        foreach ($docentesRegistrados as $docente)
//        {
//            $docente->assignRole(['Docente']);
//        }
    }
}
