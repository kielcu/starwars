<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsHasSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_has_species', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('species_id');

            $table->primary(['film_id', 'species_id']);

            $table->foreign('film_id')
                ->references('id')
                ->on('films');

            $table->foreign('species_id')
                ->references('id')
                ->on('species');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_has_species');
    }
}
