<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactaTableES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactaES', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contacta_id')->unsigned()->index()->nullable();
            $table->unsignedInteger('telefon')->nullable();
            $table->string('direccio');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('email');
            $table->string('missAccepto');
            $table->longText('missProteccio');
            $table->string('enviar');
            $table->timestamps();
        });
        Schema::table('contactaES', function($table) {
            $table->foreign('contacta_id')->references('id')->on('contacta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactaES');
    }
}
