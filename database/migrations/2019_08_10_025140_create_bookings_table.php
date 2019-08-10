<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('bookings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('hotel_id');
      $table->unsignedBigInteger('guest_id');
      $table->unsignedBigInteger('reservation_agent_id');
      $table->unsignedBigInteger('booking_status_id');
      $table->dateTime('date_from');
      $table->dateTime('date_to');
      $table->unsignedBigInteger('room_count');
      $table->string('rate')->nullable();
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
    Schema::dropIfExists('bookings');
  }
}
