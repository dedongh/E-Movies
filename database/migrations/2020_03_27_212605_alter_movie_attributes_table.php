<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMovieAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('movie_attributes', function (Blueprint $table) {

            $table->unsignedInteger('attribute_id')->after('id');
            $table->foreign('attribute_id')->references('id')->on('attributes');

            $table->string('tickets_avail')->after('auditorium');
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
        Schema::create('movie_attributes', function (Blueprint $table) {
            $table->dropColumn('tickets_avail');
        });
    }
}
