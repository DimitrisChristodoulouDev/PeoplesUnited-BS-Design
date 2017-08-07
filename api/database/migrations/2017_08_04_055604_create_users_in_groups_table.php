<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_in_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('userID')->unsigned()->comment('Ref. UserLogin.ID');
            $table->integer('groupID')->unsigned()->comment('Ref. UserGroups.ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_in_groups');
    }
}
