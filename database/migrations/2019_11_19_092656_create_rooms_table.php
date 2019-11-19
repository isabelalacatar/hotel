<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->integer('floor')->nullable(false);
            $table->integer('type')->nullable(false);
            $table->integer('view')->nullable(false);
            $table->smallInteger('status')->nullable(false)->default(0);
            $table->unsignedInteger('hotel_id')->nullable(false);

            $table->foreign("hotel_id")->references("id")->on("hotels")
                ->onUpdate("cascade")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
