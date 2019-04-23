<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
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
            $table->string('hyperdrive_rating', 10);
            $table->string('MGLT', 5);
            $table->string('starship_class', 50);

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
        Schema::dropIfExists('starships');
    }
}
