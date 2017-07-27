<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardOfDirectionPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardofdirectorPositions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('label',50);
            //TODO: Na ta valo enum???
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boardofdirectorPositions');
    }
}
