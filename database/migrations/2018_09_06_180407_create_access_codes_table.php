<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accessCode', 10)->unique();
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('buyer_id')->nullable();;
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('valid');
            $table->integer('createdBy')->nullable();
            $table->timestamps();
            // $table->foreign('class_id')->references('id')->on('class_event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_codes');
    }
}
