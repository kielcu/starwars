<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 200);
            $table->string('height', 10);
            $table->string('mass', 10);
            $table->string('hair_color', 50);
            $table->string('skin_color', 50);
            $table->string('eye_color', 50);
            $table->string('birth_year', 10);
            $table->string('gender', 10);

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
        Schema::dropIfExists('people');
    }
}
