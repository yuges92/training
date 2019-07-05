<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssessmentCriteriaQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_criteria_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('criteria_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('criteria_id')->references('id')->on('assessment_criterias')->onDelete('cascade');
            $table->unique(['question_id', 'criteria_id']);
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
        Schema::dropIfExists('assessment_criteria_question');
        
    }
}
