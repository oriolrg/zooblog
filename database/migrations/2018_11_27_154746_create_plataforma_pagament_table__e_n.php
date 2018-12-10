<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlataformaPagamentTableES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataforma_pagamentES', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plataforma_id')->unsigned()->index()->nullable();
            $table->text('avis_legal')->nullable();
            $table->text('condicions')->nullable();
            $table->text('mode_pagament')->nullable();
            $table->text('miss_fiCompra')->nullable();
            $table->text('miss_detallsFac')->nullable();
            $table->text('miss_modePagament')->nullable();
            $table->timestamps();
        });
        Schema::table('plataforma_pagamentES', function($table) {
            $table->foreign('plataforma_id')->references('id')->on('plataforma_pagament')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plataforma_pagament');
    }
}
