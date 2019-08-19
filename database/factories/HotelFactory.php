<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        //
        'hotel_star' => rand(2,5),
        'name' => $faker->name,
        'address' => $faker->address,
        'address_2' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'main_phone_number' => $faker->phoneNumber,
        'fax_number' => $faker->postcode,
        'toll_free_number' => $faker->postcode,
        'company_email_address' => $faker->companyEmail,
        'website_address' => $faker->url,
        'main' => $faker->phoneNumber,
        'image_path' => $faker->imageUrl($width = 640, $height = 480),
        
    ];
});
