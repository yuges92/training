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
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->enum('type',['course','conference','refresher']);
            $table->longText('body');
            $table->text('description');
            $table->string('originFileName')->nullable();
            $table->string('file')->nullable();
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
      Schema::dropIfExists('class_events');
      Schema::dropIfExists('assignments');
        Schema::dropIfExists('courses');
    }
}
