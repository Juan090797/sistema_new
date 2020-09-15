<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image_path', 20)->default('default_profile.png');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //relacionando annexed con la tabla empresa.
            $table->unsignedBigInteger('empresa_id')->nullable(false);
            $table->foreign('empresa_id')->references('id')->on('empresas')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla empresa.
            $table->unsignedBigInteger('area_id')->nullable(false);
            $table->foreign('area_id')->references('id')->on('areas')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            $table->unsignedBigInteger('created_by')->index;
            $table->unsignedBigInteger('updated_by')->index;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
