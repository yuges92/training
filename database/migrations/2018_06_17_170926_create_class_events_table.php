<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassEventsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('class_events', function (Blueprint $table) {
      $table->increments('id');
      // $table->string('slug')->unique();
      $table->integer('course_id')->unsigned();
      $table->integer('address_id')->unsigned();
      $table->string('title')->unique();
      $table->string('slug')->unique();
      $table->string('description');
      $table->date('startDate');
      $table->time('startTimeStart');
      $table->time('endTimeStart');
      $table->date('endDate');
      $table->time('startTimeEnd');
      $table->time('endTimeEnd');
      $table->enum('type',['public','private','closed']);
      $table->integer('space');
      $table->integer('availableSpace');
      $table->double('price');
      $table->string('originFileName')->nullable();
      $table->string('file')->nullable();
      $table->integer('createdBy');
      $table->integer('updatedBY')->nullable();
      $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
      // $table->foreign('address_id')->references('id')->on('class_addresses')->onDelete('set null');
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
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('carts');
    Schema::dropIfExists('access_codes');
    Schema::dropIfExists('class_trainer');
    Schema::dropIfExists('class_addresses');
    Schema::dropIfExists('class_events');
  }
}
