<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnicalStuffPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_stuff_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('label',50);
            /*
             * Positions(new table):
             * First Team Coach,
             * First Team Assistant Coach,
             * Goalkeeper Coach,
             * Fitness Coach,
             * Physiotherapist,
             * Performance Coach,
             * Football Analyst,
             * Opponent Analyst,
             * U21 Coach,
             * U19 Coach,
             * U17 Coach,
             * U15 Coach
			 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technical_stuff_positions');
    }
}
