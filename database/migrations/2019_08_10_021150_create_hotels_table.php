<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_star');
		    $table->string('name');
		    $table->text('motto')->nullable();
            $table->string('address');
            $table->string('city');
		    $table->string('country');
		    $table->string('address_2')->nullable();
		    $table->string('main_phone_number');
		    $table->string('toll_free_number')->nullable();
		    $table->string('company_email_address')->nullable();
		    $table->string('website_address')->nullable();
		    $table->string('image')->default('default.png');
		    $table->string('image_link')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('hotels');
    }
}
