<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('check_in_date')->nullable(false);
            $table->date('check_out_date')->nullable(false);
            $table->unsignedInteger('room_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);



            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate("cascade")->onDelete("cascade");


            $table->foreign("room_id")->references("id")->on("rooms")
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
        Schema::dropIfExists('reservations');
    }
}
