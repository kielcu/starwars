<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleHasSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_has_species', function (Blueprint $table) {
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('species_id');

            $table->primary(['people_id', 'species_id']);

            $table->foreign('people_id')
                ->references('id')
                ->on('people');

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
        Schema::dropIfExists('people_has_species');
    }
}
