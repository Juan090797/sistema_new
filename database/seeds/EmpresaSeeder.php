<?php

use App\Modelos\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Empresa();
        $empresa -> nombre_empr = 'RepuestosFreddy';
        $empresa -> estado_empr = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();

        $empresa = new Empresa();
        $empresa -> nombre_empr = 'Gc Importadores';
        $empresa -> estado_empr = 'Activo';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();
    }
}
