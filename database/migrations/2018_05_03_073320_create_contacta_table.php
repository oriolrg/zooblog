<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacta', function (Blueprint $table) {
            $table->increments('id');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacta');
    }
}
