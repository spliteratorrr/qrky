<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrkiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrkies', function (Blueprint $table) {
            // Primary text key
            $table->text('id');

            // Metadata
            $table->string('name');
            $table->string('content');
            $table->integer('content_type');
            $table->integer('status');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            
            // Ownership
            $table->bigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            
            // Groupings
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups');

            // Scan data
            $table->integer('total_scans');
            $table->integer('unique_scans');
            
            // Timestamps
            $table->timestamps();
            $table->timestamp('deployed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrkies');
    }
}
