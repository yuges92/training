<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_criterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('course_id');
            $table->string('number');
            $table->text('description');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unique(['course_id','number']);
            $table->integer('createdBy')->nullable();
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
        Schema::dropIfExists('assessment_criterias');
    }
}
