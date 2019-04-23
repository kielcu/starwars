<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 200);
            $table->string('model', 250);
            $table->string('manufacturer', 250);
            $table->string('cost_in_credits', 20);
            $table->string('length', 10);
            $table->string('max_atmosphering_speed', 10);
            $table->string('crew', 10);
            $table->string('passengers', 10);
            $table->string('cargo_capacity', 20);
            $table->string('consumables', 20);
            $table->string('vehicle_class', 10);

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
