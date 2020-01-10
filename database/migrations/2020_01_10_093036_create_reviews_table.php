<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedInteger('hotel_id')->nullable(false);
            $table->integer('rating')->nullable(false);
           // $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('reviews');
    }
}
