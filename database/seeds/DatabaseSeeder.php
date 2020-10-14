<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PersonaSeeder::class,
            TelefonoSeeder::class,
            AsistenciaSeeder::class,
            DocenteSeeder::class,
            ProveedorSeeder::class,
            AdministrativoSeeder::class,
            AlmacenSeeder::class,
            NombreInstrumentoSeeder::class,
            PedidoSeeder::class,
            CompraSeeder::class,
            InstrumentoSeeder::class,
            DetallePedidoSeeder::class,
            PrestamoSeeder::class,
            DetallePrestamoSeeder::class,
            DevolucionSeeder::class,
            DetalleDevolucionSeeder::class,
            EspecialidadSeeder::class,
            AfinidadSeeder::class,
            CursoSeeder::class,
            PeriodoSeeder::class,
            PromocionSeeder::class,
            MateriaSeeder::class,
            DetallePromocionSeeder::class,
            MateriaCursoSeeder::class,
            GrupoSeeder::class,
            HorarioSeeder::class,
            GrupoHorarioSeeder::class,
            RolSeeder::class,
            PermisoSeeder::class,
            RolPermisoSeeder::class,
            UserSeeder::class,
            UserPermisoSeeder::class,
            UserRolSeeder::class,
        ]);
      /*  $this->call([
            PermisoSeeder::class,

            RolPermisoSeeder::class,
            ]);*/
    }
}
