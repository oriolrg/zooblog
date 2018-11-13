<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApadrinaTableEN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apadrina_EN', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apadrina_id')->unsigned()->index()->nullable();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('imatge')->nullable();
            $table->integer('preu')->nullable();
            $table->tinyInteger('apadrinat'); // 0 No / 1 Si
            $table->tinyInteger('status'); // 0 No publicado / 1 Publicado
            $table->unsignedInteger('categoria_id')->nullable();
            $table->unsignedInteger('animal_id')->nullable();
            $table->timestamps();
        });
        Schema::table('apadrina_EN', function($table) {
            $table->foreign('apadrina_id')->references('id')->on('apadrina')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apadrina_EN');
    }
}
