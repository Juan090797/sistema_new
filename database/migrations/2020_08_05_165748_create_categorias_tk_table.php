<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_tk', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cat');
            $table->string('estado_cat');
            $table->timestamps();

            $table->unsignedInteger('created_by')->index;
            $table->unsignedInteger('updated_by')->index;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_tk');
    }
}
