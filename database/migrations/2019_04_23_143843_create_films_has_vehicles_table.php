<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsHasVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_has_vehicles', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('vehicle_id');

            $table->primary(['film_id', 'vehicle_id']);

            $table->foreign('film_id')
                ->references('id')
                ->on('films');

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_has_vehicles');
    }
}
