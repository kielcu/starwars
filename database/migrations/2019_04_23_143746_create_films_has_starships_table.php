<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsHasStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_has_starships', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('starship_id');

            $table->primary(['film_id', 'starship_id']);

            $table->foreign('film_id')
                ->references('id')
                ->on('films');

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
        Schema::dropIfExists('films_has_starships');
    }
}
