<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignmentDeadline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_deadline', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assignment_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_events')->onDelete('cascade');
            $table->date('date');
            $table->date('resubmissionDate')->nullable();
            $table->unique(['assignment_id', 'class_id']);
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
        Schema::dropIfExists('assignment_deadline');
        //
    }
}
