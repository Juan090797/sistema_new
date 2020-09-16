<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user -> email = 'jmarquinav@repuestosfreddy.com';
        $user -> username = 'jmarquinav';
        $user -> first_name = 'Juan Antonio';
        $user -> last_name = 'Marquina Ventura';
        $user -> password = bcrypt('password');
        $user -> empresa_id = 1;
        $user -> image_path = 'default_profile.png';
        $user -> area_id = 1;
        $user -> created_by = 1;
        $user -> updated_by = 1;
        $user ->save();
    }
}
