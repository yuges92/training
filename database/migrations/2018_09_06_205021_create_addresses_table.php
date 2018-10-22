<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->enum('type',['home','billing']);
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('town');
            $table->string('county');
            $table->string('postcode');
            $table->string('country');
            $table->integer('createdBy')->nullable();
            $table->integer('updatedBY')->nullable();
            $table->unique(['type','user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('addresses');
    }
}
