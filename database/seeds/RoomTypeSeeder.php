<?php

use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('room_types')->insert([
            'room_type'=>'A1',
            'description'=>'For 2 adults and 1 kid',
            'active'=>1
        ]);

        DB::table('room_types')->insert([
            'room_type'=>'A2',
            'description'=>'For 4 adults and 2 kid',
            'active'=>1
        ]);

        DB::table('room_types')->insert([
            'room_type'=>'A3',
            'description'=>'For 6 adults and 3 kid',
            'active'=>1
        ]);

        DB::table('room_types')->insert([
            'room_type'=>'A4',
            'description'=>'For 10 adults',
            'active'=>1
        ]);

        DB::table('room_types')->insert([
            'room_type'=>'B1',
            'description'=>'Meeting room for 20 adults',
            'active'=>1
        ]); 

        DB::table('room_types')->insert([
            'room_type'=>'B2',
            'description'=>'Meeting room for 35 adults',
            'active'=>1
        ]); 

        DB::table('room_types')->insert([
            'room_type'=>'B3',
            'description'=>'Meeting room for 50 adults',
            'active'=>1
        ]); 
    }
}
