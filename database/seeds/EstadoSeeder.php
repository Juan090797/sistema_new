<?php

use App\Modelos\Estado_tk;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Estado_tk();
        $empresa -> nombre_est = 'Abierto';
        $empresa -> estado_est = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();

        $empresa = new Estado_tk();
        $empresa -> nombre_est = 'Asignado';
        $empresa -> estado_est = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();

        $empresa = new Estado_tk();
        $empresa -> nombre_est = 'Resuelto';
        $empresa -> estado_est = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();

        $empresa = new Estado_tk();
        $empresa -> nombre_est = 'Cerrado';
        $empresa -> estado_est = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();

        $empresa = new Estado_tk();
        $empresa -> nombre_est = 'Cancelado';
        $empresa -> estado_est = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();
    }
}
