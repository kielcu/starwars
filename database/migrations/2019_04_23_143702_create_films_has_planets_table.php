<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsHasPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_has_planets', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('planet_id');

            $table->primary(['film_id', 'planet_id']);

            $table->foreign('film_id')
                ->references('id')
                ->on('films');

            $table->foreign('planet_id')
                ->references('id')
                ->on('planets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_has_planets');
    }
}
