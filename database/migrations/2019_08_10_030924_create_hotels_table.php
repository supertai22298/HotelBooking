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
            $table->string('hotel_code', 20);
		    $table->string('name', 20);
		    $table->string('address', 40);
		    $table->string('address_2', 40)->default(null);
		    $table->string('city', 40);
		    $table->string('country', 40);
		    $table->string('main_phone_number', 11)->default(null);
		    $table->string('fax_number', 11)->default(null);
		    $table->string('toll_free_number', 11)->default(null);
		    $table->string('company_email_address', 50)->default(null);
		    $table->string('website_address', 50)->default(null);
		    $table->string('main', 20)->default(null);
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
