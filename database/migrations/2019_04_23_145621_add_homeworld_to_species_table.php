<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomeworldToSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->unsignedInteger('planet_id');

            $table->foreign('planet_id')
                ->on('planets')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('species', function (Blueprint $table) {
            $table->dropForeign(['planet_id']);
            $table->dropColumn('planet_id');
        });
    }
}
