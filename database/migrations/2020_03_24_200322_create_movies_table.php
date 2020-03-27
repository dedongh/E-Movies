<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('cover');
            $table->longText('description')->nullable();
            $table->date('release_date');
            $table->decimal('ticket_price',8,2);
            $table->date('start_show_date');
            $table->date('end_show_date');
            $table->string('running_time')->nullable();
            $table->boolean('new_item')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('premiere')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('coming_soon')->default(0);
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
        Schema::dropIfExists('movies');
    }
}
