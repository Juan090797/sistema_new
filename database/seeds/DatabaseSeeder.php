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
        $this->call(AreaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadoSeeder::class);
    }
}
