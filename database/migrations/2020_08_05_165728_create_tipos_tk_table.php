<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_tk', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tip');
            $table->string('estado_tip');
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
        Schema::dropIfExists('tipos_tk');
    }
}
