<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassEventTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classEvent_trainer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_events')->onDelete('cascade');
            $table->unique(['class_id','user_id']);
            $table->integer('createdBy');
            $table->integer('updatedBY')->nullable();
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
        Schema::dropIfExists('classEvent_trainer');
    }
}
