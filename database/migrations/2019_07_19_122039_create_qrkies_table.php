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
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            
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
