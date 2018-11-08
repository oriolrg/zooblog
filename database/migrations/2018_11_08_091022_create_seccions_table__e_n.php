<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionsTableEN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccionsEN', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccions_id')->unsigned()->index()->nullable();
            $table->string('title');
            $table->text('description');
            $table->text('list')->nullable();
            $table->string('imatge')->nullable();
            $table->string('alt_imatge')->nullable();
            $table->tinyInteger('status'); // 0 No publicado / 1 Publicado
            $table->tinyInteger('ordre'); 
            $table->unsignedInteger('animal_id')->nullable();
            $table->timestamps();
        });
        Schema::table('seccionsEN', function($table) {
            $table->foreign('seccions_id')->references('id')->on('seccions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccionsEN');
    }
}
