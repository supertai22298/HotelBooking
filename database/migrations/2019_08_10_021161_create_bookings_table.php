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
      $table->unsignedBigInteger('room_id');
      $table->unsignedBigInteger('profile_id');
      $table->unsignedBigInteger('booking_status_id');
      $table->dateTime('date_from');
      $table->dateTime('date_to');
      $table->timestamps();
      $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
      $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
      $table->foreign('booking_status_id')->references('id')->on('booking_statuses')->onDelete('cascade');
      $table->softDeletes();

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
