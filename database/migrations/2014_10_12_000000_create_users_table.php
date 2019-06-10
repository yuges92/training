<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone')->nullable();
            $table->string('organisation')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['approved','blocked','pending'])->default('pending');
            // $table->enum('role',['Super Admin','Admin','Manager','Trainer','Moderator','OCN','Learner','Commissioner'])->default('Learner');
            $table->rememberToken();
            // $table->string('api_token', 60)->unique()->nullable()->default(null);
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
        Schema::dropIfExists('order_payments');
        Schema::dropIfExists('role_user');
    Schema::dropIfExists('user_gdprs');
      Schema::dropIfExists('classevent_trainer');
      Schema::dropIfExists('addresses');
      Schema::dropIfExists('class_students');
      Schema::dropIfExists('carts');
      Schema::dropIfExists('user_details');
      Schema::dropIfExists('users');
    }
}
