<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_tk');
            $table->string('descripcion_tk');
            $table->string('estado_tk');
            $table->timestamps();

            //relacionando annexed con la tabla tipos_tk.
            $table->unsignedBigInteger('tipo_id')->nullable(false);
            $table->foreign('tipo_id')->references('id')->on('tipos_tk')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla categorias_tk.
            $table->unsignedBigInteger('categoria_id')->nullable(false);
            $table->foreign('categoria_id')->references('id')->on('categorias_tk')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla prioridades_tk.
            $table->unsignedBigInteger('prioridad_id')->nullable(false);
            $table->foreign('prioridad_id')->references('id')->on('prioridades_tk')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla users.
            $table->unsignedBigInteger('requester_user_id')->nullable(false);
            $table->foreign('requester_user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
            //fin de la relacion

            //relacionando annexed con la tabla users.
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
        Schema::dropIfExists('tickets');
    }
}