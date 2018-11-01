<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministraTableES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administra_ES', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administraES_id')->unsigned()->index()->nullable();
            $table->string('titol');
            $table->text('description')->nullable();
            $table->text('llista')->nullable();
            $table->timestamps();
            
        });
        Schema::table('administra_ES', function($table) {
            $table->foreign('administraES_id')->references('id')->on('administra')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administra_ES');
    }
}
