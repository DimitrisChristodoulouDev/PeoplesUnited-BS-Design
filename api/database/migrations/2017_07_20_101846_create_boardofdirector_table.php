0<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardofdirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_Of_director', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('jobDescription',250)->nullable();
            $table->integer('positionID', false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_Of_director');
    }
}
