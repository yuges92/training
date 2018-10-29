<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->enum('status',['completed','failed','cancelled', 'refunded', 'pending'])->default('pending');
      $table->string('billingFirstName');
      $table->string('billingLastName');
      $table->string('billingTel');
      $table->string('billingEmail');
      $table->string('billingLine1');
      $table->string('billingLine2')->nullable();
      $table->string('billingTown');
      $table->string('billingCounty');
      $table->string('billingPostcode');
      $table->string('billingCountry');
      $table->string('referralCode')->nullable();;
      $table->enum('paymentMethod',['paypal','invoiceRequest']);
      $table->string('termsCondition');
      $table->string('poNumber')->nullable();
      $table->boolean('isSelf');
      // $table->string('promotionalCode')->nullable();
      $table->double('total');
      $table->double('subTotal');
      $table->double('totalVat');
      $table->double('vat');
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
    Schema::dropIfExists('order_details');
    Schema::dropIfExists('order_payments');
    Schema::dropIfExists('orders');
  }
}
