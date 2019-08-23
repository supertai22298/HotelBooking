<?php

use Illuminate\Database\Seeder;

class HotelUtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotel_utilities')->insert([
            'hotel_id'=>rand(1,10),
            'utility'=>'Pool added',
            'description'=>'Hope you enjoy the utility ',
            'image'=>'image1'

        ]);

        DB::table('hotel_utilities')->insert([
            'hotel_id'=>rand(1,10),
            'utility'=>'Free taxi-fee',
            'description'=>'Hope you enjoy the utility ',
            'image'=>'image1'
        ]);

        DB::table('hotel_utilities')->insert([
            'hotel_id'=>rand(1,10),
            'utility'=>'Free Breakfast',
            'description'=>'Hope you enjoy the utility ',
            'image'=>'image1'
        ]);

        DB::table('hotel_utilities')->insert([
            'hotel_id'=>rand(1,10),
            'utility'=>'Funny Game',
            'description'=>'Hope you enjoy the utility ',
            'image'=>'image1'
        ]);

        DB::table('hotel_utilities')->insert([
            'hotel_id'=>rand(1,10),
            'utility'=>'Free Touristguide',
            'description'=>'Hope you enjoy the utility ',
            'image'=>'image1'
        ]);
    }
}
