<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadesTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridades_tk', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pri');
            $table->string('estado_pri');
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
        Schema::dropIfExists('prioridades_tk');
    }
}
