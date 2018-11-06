<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTableEN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_EN', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animalsEN_id')->unsigned()->index()->nullable();
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
            $table->string('alt_imatge')->nullable();
            $table->timestamps();
        });
        Schema::table('animals_EN', function($table) {
            $table->foreign('animalsEN_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals_EN');
    }
}
