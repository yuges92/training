<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('class_id');
            $table->integer('day');
            $table->date('date');
            $table->time('startTime');
            $table->time('endTime');
            $table->foreign('class_id')->references('id')->on('class_events')->onDelete('cascade');
            $table->integer('createdBy')->nullable();
            $table->integer('updatedBY')->nullable();
            $table->unique(['class_id','day']);
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
        Schema::dropIfExists('class_dates');
    }
}
