<?php

use App\Modelos\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria -> nombre_cat = 'Software';
        $categoria -> estado_cat = 'Activo';
        $categoria -> created_by = 1;
        $categoria -> updated_by = 1;
        $categoria ->save();

        $categoria = new Categoria();
        $categoria -> nombre_cat = 'Hardware';
        $categoria -> estado_cat = 'Activo';
        $categoria -> created_by = 1;
        $categoria -> updated_by = 1;
        $categoria ->save();

        $categoria = new Categoria();
        $categoria -> nombre_cat = 'Others';
        $categoria -> estado_cat = 'Activo';
        $categoria -> created_by = 1;
        $categoria -> updated_by = 1;
        $categoria ->save();
    }
}
