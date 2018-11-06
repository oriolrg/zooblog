<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTableES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_ES', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animalsES_id')->unsigned()->index()->nullable();
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
        Schema::table('animals_ES', function($table) {
            $table->foreign('animalsES_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals_ES');
    }
}
