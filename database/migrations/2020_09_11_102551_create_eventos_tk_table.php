<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_tk', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            //relacionando annexed con la tabla tipos_tk.
            $table->unsignedBigInteger('ticket_id')->nullable(false);
            $table->foreign('ticket_id')->references('id')->on('tickets')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla tipos_tk.
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos_tk');
    }
}
