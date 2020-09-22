<?php

use App\Modelos\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new Area();
        $area -> nombre_area = 'Sistemas';
        $area -> estado_area = 'Activo';
        $area -> created_by = 1;
        $area -> updated_by = 1;
        $area ->save();

        $area = new Area();
        $area -> nombre_area = 'Recursos Humanos';
        $area -> estado_area = 'Activo';
        $area -> created_by = 1;
        $area -> updated_by = 1;
        $area ->save();

        $area = new Area();
        $area -> nombre_area = 'Administracion';
        $area -> estado_area = 'Activo';
        $area -> created_by = 1;
        $area -> updated_by = 1;
        $area ->save();

        $area = new Area();
        $area -> nombre_area = 'Contabilidad';
        $area -> estado_area = 'Activo';
        $area -> created_by = 1;
        $area -> updated_by = 1;
        $area ->save();

        $area = new Area();
        $area -> nombre_area = 'VPM';
        $area -> estado_area = 'Activo';
        $area -> created_by = 1;
        $area -> updated_by = 1;
        $area ->save();
    }
}
