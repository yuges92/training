<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->unsignedInteger('parent_id')->nullable();
            $table->enum('status', ['publish', 'draft', 'private'])->default('draft');
            $table->text('description')->nullable();
            $table->boolean('enable_megamenu')->default(1);
            $table->integer('position')->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_types');
    }
}