<?php

use App\Core\Models\Administrativo;
use App\Core\Repositories\AdministrativoRepository;
use App\Core\Repositories\CargoAdministrativoTrait;
use Illuminate\Database\Seeder;
use App\Http\Controllers\AdministrativoController;

class AdministrativoSeeder extends Seeder
{

    /**
     * traits
     */
    use CargoAdministrativoTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrativo::create([
            'persona_id' => 3,
            'cargo' => $this->GERENTE,
            'inicio' => '2018-05-03'
        ]);
        Administrativo::create([
            'persona_id' => 9,
            'cargo' => $this->ENCARGADO_DE_ALMACEN,
            'inicio' => '2019-10-03'
        ]);
        Administrativo::create([
            'persona_id' => 15,
            'cargo' => $this->ENCARGADO_DE_FINANZAS,
            'inicio' => '2018-09-21'
        ]);
        Administrativo::create([
            'persona_id' => 18,
            'cargo' => $this->SECRETARIA,
            'inicio' => '2019-08-10'
        ]);
        Administrativo::create([
            'persona_id' => 20,
            'cargo' => $this->ENCARGADO_DE_ALMACEN,
            'inicio' => '2018-04-15'
        ]);
        Administrativo::create([
            'persona_id' => 21,
            'cargo' => $this->ENCARGADO_DE_ALMACEN,
            'inicio' => '2019-02-09'
        ]);
    }
}
