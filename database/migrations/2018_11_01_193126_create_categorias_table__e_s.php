<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTableES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_ES', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('categoriasES_id')->unsigned()->index()->nullable();
          $table->string('title')->nullable();
          $table->text('description')->nullable();
          $table->string('alt_imatge')->nullable();
          $table->timestamps();
        });
        Schema::table('categorias_ES', function($table) {
            $table->foreign('categoriasES_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_ES');
    }
}
