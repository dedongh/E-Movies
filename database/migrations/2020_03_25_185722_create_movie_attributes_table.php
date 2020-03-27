<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('time');
            $table->unsignedInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies');
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
        Schema::dropIfExists('movie_attributes');
    }
}
