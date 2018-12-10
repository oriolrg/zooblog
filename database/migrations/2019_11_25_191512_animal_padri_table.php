<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnimalPadriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_padri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('padri_id')->unsigned()->index()->nullable();
            $table->integer('animal_id')->unsigned()->index()->nullable();
            $table->timestamps();
        });
        Schema::table('animal_padri', function($table) {
            $table->foreign('padri_id')->references('id')->on('usuarisPadri')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('apadrina')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
