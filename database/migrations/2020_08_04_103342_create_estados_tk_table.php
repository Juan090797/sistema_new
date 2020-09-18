<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_tk', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_est');
            $table->string('estado_est');
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
        Schema::dropIfExists('estados_tk');
    }
}
