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
            $table->string('ocurrencia')->nullable();
            $table->string('mida')->nullable();
            $table->string('pes')->nullable();
            $table->string('embaras')->nullable();;
            $table->string('cries')->nullable();
            $table->string('vida')->nullable();
            $table->string('dieta')->nullable();
            $table->string('proteccio')->nullable();
            $table->text('description')->nullable();
            $table->string('imatge')->nullable();
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
