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
            $table->tinyInteger('status'); // 0 No publicado / 1 Publicado
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
