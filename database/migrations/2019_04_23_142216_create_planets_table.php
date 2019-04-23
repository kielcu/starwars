<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 200);
            $table->string('rotation_period', 5);
            $table->string('orbital_period', 5);
            $table->string('diameter', 10);
            $table->string('climate', 50);
            $table->string('gravity', 50);
            $table->string('terrain', 50);
            $table->string('surface_water', 50);
            $table->string('population', 50);

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
        Schema::dropIfExists('planets');
    }
}
