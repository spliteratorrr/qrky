<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrkyGroupUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrky_group_user', function (Blueprint $table) {
            $table->bigInteger('qrky_group_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('qrky_group_id')->references('id')->on('qrky_groups');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrky_group_user');
    }
}
