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
        $empresa -> estado_empr = 'A';
        $empresa -> created_by = 1;
        $empresa -> updated_by = 1;
        $empresa ->save();
    }
}