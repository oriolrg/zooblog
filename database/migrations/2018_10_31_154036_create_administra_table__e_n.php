<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministraTableEN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administra_EN', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administraEN_id')->unsigned()->index()->nullable();
            $table->string('titol');
            $table->text('description')->nullable();
            $table->text('llista')->nullable();
            $table->string('imatge')->nullable();
            $table->string('alt_imatge')->nullable();
            $table->string('menu1')->nullable();
            $table->string('menu2')->nullable();
            $table->string('menu3')->nullable();
            $table->string('menu4')->nullable();
            $table->string('menu5')->nullable();
            $table->string('menu6')->nullable();
            $table->string('menu7')->nullable();
            $table->longText('politicaPrivacitat')->nullable();
            $table->timestamps();
            
        });
        Schema::table('administra_EN', function($table) {
            $table->foreign('administraEN_id')->references('id')->on('administra')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administra_EN');
    }
}
