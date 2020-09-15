<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_tk', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->timestamps();

            //relacionando annexed con la tabla tickets.
            $table->unsignedBigInteger('ticket_id')->nullable(false);
            $table->foreign('ticket_id')->references('id')->on('tickets')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla usuarios.
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('comentarios_tk');
    }
}
