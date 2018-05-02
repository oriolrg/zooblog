i<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('nomcientific');
            $table->string('ocurrencia');
            $table->string('mida');
            $table->string('pes');
            $table->string('embaras');
            $table->string('cries');
            $table->string('vida');
            $table->string('dieta');
            $table->string('proteccio');
            $table->text('description');
            $table->string('imatge');
            $table->tinyInteger('status'); // 0 No publicado / 1 Publicado
            $table->unsignedInteger('categoria_id')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
