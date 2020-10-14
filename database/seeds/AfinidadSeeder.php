<?php

use App\Core\Models\Afinidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AfinidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidadDeEspecialidades = DB::table('especialidades')->count();
        $docentesId = DB::table('docentes')->select('persona_id')->get();
        for ($i = 0; $i < sizeof($docentesId); $i++) {
            $especialidadesActuales = mt_rand(1, 3);
            $especialidadesId = [];
            while (count($especialidadesId) < $especialidadesActuales) {
                $rand = mt_rand(1, $cantidadDeEspecialidades);
                $especialidadesId[$rand] = $rand;
            }
            foreach ($especialidadesId as $especialidadId)
            {
                Afinidad::create([
                    'docente_id' => $docentesId[$i]->persona_id,
                    'especialidad_id' => $especialidadId
                ]);
            }
        }
    }
}
