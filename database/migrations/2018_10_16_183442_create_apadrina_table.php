<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApadrinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apadrina', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('imatge')->nullable();
            $table->integer('preu')->nullable();
            $table->tinyInteger('apadrinat'); // 0 No / 1 Si
            $table->tinyInteger('status'); // 0 No publicado / 1 Publicado
            $table->unsignedInteger('categoria_id')->nullable();
            $table->unsignedInteger('animal_id')->nullable();
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
        Schema::dropIfExists('apadrina');
    }
}
