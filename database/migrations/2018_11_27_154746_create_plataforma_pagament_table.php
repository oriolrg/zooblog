<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlataformaPagamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataforma_pagament', function (Blueprint $table) {
            $table->increments('id');
            //Catala
            $table->text('avis_legal')->nullable();
            $table->text('condicions')->nullable();
            $table->text('mode_pagament')->nullable();
            $table->text('miss_fiCompra')->nullable();
            $table->text('miss_detallsFac')->nullable();
            $table->text('miss_modePagament')->nullable();
            //Español
            $table->text('avis_legalES')->nullable();
            $table->text('condicionsES')->nullable();
            $table->text('mode_pagamentES')->nullable();
            $table->text('miss_fiCompraES')->nullable();
            $table->text('miss_detallsFacES')->nullable();
            $table->text('miss_modePagamentES')->nullable();
            //Angles    
            $table->text('avis_legalEN')->nullable();
            $table->text('condicionsEN')->nullable();
            $table->text('mode_pagamentEN')->nullable();
            $table->text('miss_fiCompraEN')->nullable();
            $table->text('miss_detallsFacEN')->nullable();
            $table->text('miss_modePagamentEN')->nullable();
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
        Schema::dropIfExists('plataforma_pagament');
    }
}
