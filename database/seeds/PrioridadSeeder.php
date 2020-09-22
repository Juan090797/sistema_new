<?php

use App\Modelos\Prioridad;
use Illuminate\Database\Seeder;

class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prioridad = new Prioridad();
        $prioridad -> nombre_pri = 'Alta';
        $prioridad -> estado_pri = 'Activo';
        $prioridad -> created_by = 1;
        $prioridad -> updated_by = 1;
        $prioridad ->save();

        $prioridad = new Prioridad();
        $prioridad -> nombre_pri = 'Media';
        $prioridad -> estado_pri = 'Activo';
        $prioridad -> created_by = 1;
        $prioridad -> updated_by = 1;
        $prioridad ->save();

        $prioridad = new Prioridad();
        $prioridad -> nombre_pri = 'Baja';
        $prioridad -> estado_pri = 'Activo';
        $prioridad -> created_by = 1;
        $prioridad -> updated_by = 1;
        $prioridad ->save();
    }
}
