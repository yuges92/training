<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('assignment_id');
            $table->enum('type', ['dropdown','multiple','comment','file'])->default('comment');
            $table->string('number');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->unique(['assignment_id', 'number']);
            $table->bigInteger('textLimit')->nullable();
            $table->integer('createdBy')->nullable();
            $table->integer('updatedBY')->nullable();
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
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
        Schema::dropIfExists('question_answers');
        Schema::dropIfExists('questions');
    }
}
