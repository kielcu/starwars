<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleHasVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_has_vehicles', function (Blueprint $table) {
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('vehicle_id');

            $table->primary(['people_id', 'vehicle_id']);

            $table->foreign('people_id')
                ->references('id')
                ->on('people');

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
        Schema::dropIfExists('people_has_vehicles');
    }
}
