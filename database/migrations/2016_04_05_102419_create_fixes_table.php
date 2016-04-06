<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('sum', 10, 2);
            $table->text('comment');
            $table->date('date');
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
        Schema::drop('fixes');
    }
}
