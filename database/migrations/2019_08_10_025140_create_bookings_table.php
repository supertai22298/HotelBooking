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
      $table->integer('hotel_id');
      $table->integer('guest_id');
      $table->integer('reservation_agent_id');
      $table->integer('booking_status_id');
      $table->dateTime('date_from');
      $table->dateTime('date_to');
      $table->integer('room_count');
      $table->string('rate', 20)->nullable();
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
