<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 200);
            $table->string('classification', 20);
            $table->string('designation', 20);
            $table->string('average_height', 10);
            $table->string('skin_colors', 250);
            $table->string('hair_colors', 250);
            $table->string('eye_colors', 250);
            $table->string('average_lifespan', 50);
            $table->string('language', 50);

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
        Schema::dropIfExists('species');
    }
}
