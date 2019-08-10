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
            $table->string('hotel_code');
		    $table->string('name');
		    $table->string('address');
		    $table->string('address_2')->default(null);
		    $table->string('city');
		    $table->string('country');
		    $table->string('main_phone_number')->default(null);
		    $table->string('fax_number')->default(null);
		    $table->string('toll_free_number')->default(null);
		    $table->string('company_email_address')->default(null);
		    $table->string('website_address')->default(null);
		    $table->string('main')->default(null);
		    $table->text('image_path');
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
        Schema::dropIfExists('hotels');
    }
}
