<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('movie_id')->index();
            $table->string('thumbnail')->nullable();
            $table->string('full')->nullable();

            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

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
        Schema::dropIfExists('movie_images');
    }
}
