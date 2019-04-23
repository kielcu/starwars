<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleHasStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_has_starships', function (Blueprint $table) {
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('starship_id');

            $table->primary(['people_id', 'starship_id']);

            $table->foreign('people_id')
                ->references('id')
                ->on('people');

            $table->foreign('starship_id')
                ->references('id')
                ->on('starships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_has_starships');
    }
}
