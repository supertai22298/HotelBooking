<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('guests', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('first_name', 20);
      $table->string('last_name', 20);
      $table->string('address', 40);
      $table->string('address_2', 40)->nullable();
      $table->string('city', 40);
      $table->string('state', 40)->nullable();
      $table->string('country', 40);
      $table->string('hotel_phone_number', 11);
      $table->string('Cellular_number', 11)->nullable();
      $table->string('email_address', 30);
      $table->integer('gender');
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
    Schema::dropIfExists('guests');
  }
}
