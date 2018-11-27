<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarisPadriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('usuarisPadri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contacta_id')->unsigned()->index()->nullable();
            $table->unsignedInteger('telefon')->nullable();
            $table->string('nom');
            $table->string('cognoms')->nullable();
            $table->string('direccio')->nullable();
            $table->string('codiPostal');
            $table->string('localitat');
            $table->longText('email');
            $table->string('telefon');
            $table->string('dni');
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
        //
    }
}
