<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->enum('status', ['day', 'night', 'none']);
            $table->boolean('approved');
            $table->date('date_approved')->nullable();
            $table->boolean('submitted');
            $table->date('date_submitted')->nullable();
            $table->boolean('cancelled');
            $table->date('date_cancelled')->nullable();
            $table->integer('week_id')->unsigned()->nullable();
            $table->foreign('week_id')->references('id')->on('week')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('day');
    }
}
