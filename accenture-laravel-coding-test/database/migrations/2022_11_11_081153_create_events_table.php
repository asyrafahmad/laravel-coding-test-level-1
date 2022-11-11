<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');                         // name column 
            $table->string('slug')->unique();               // slug column 
            $table->dateTime('startAt')->nullable();        // startAt column
            $table->dateTime('endAt')->nullable();          // endAt column
            $table->dateTime('createdAt')->nullable();      // createdAt column
            $table->dateTime('updatedAt')->nullable();      // updatedAt column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
