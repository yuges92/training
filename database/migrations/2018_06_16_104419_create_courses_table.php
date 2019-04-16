<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('course_code')->unique();
            $table->unsignedInteger('course_type_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->enum('status',['publish','draft','private']);
            // $table->enum('type',['course','conference','refresher']);
            $table->string('password')->nullable();
            $table->text('description');
            $table->longText('body');
            // $table->string('originFileName')->nullable();
            // $table->string('file')->nullable();
            $table->integer('createdBy');
            // $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
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
      Schema::dropIfExists('class_events');
      Schema::dropIfExists('assignments');
      Schema::dropIfExists('courses');
    }
}
