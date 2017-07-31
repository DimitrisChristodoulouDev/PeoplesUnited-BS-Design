<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('clubName',50);
            $table->integer('clubAgent',false);//Agent ID
            $table->string('country',250);
            $table->string('city', 250);
            $table->string('stadium', 50);
            $table->string('address', 250);
            $table->string('telephone', 50);
            $table->string('fax', 50);
            $table->string('email', 50);
            $table->string('website', 250);
            $table->string('socialMedia', 250);
            $table->integer('averageSalary', false);
            $table->string('bankAccount', 50);
            $table->integer('vat', false);
            $table->string('notes', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}