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
            $table->string('course_code')->unique();
            $table->unsignedBigInteger('course_type_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->enum('status', ['publish', 'draft', 'private']);
            $table->boolean('enable_megamenu')->default(1);
            $table->integer('position')->nullable();
            // $table->enum('type',['course','conference','refresher']);
            $table->string('password')->nullable();
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            // $table->text('pre_requisites')->nullable();
            // $table->text('learning_outcome')->nullable();
            // $table->text('for_who')->nullable();
            // $table->text('course_length')->nullable();
            // $table->text('learning_outcome')->nullable();
            // $table->text('assignment_requirements')->nullable();
            $table->string('image')->nullable();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
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
        Schema::dropIfExists('course_bodies');
        Schema::dropIfExists('class_events');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('courses');
    }
}