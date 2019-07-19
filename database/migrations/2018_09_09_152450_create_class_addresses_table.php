<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_addresses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('line1');
          $table->string('line2')->nullable();
          $table->string('town');
          $table->string('county');
          $table->string('postcode');
          $table->string('country');
          $table->longText('detail')->nullable();
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
        Schema::dropIfExists('class_addresses');
    }
}
