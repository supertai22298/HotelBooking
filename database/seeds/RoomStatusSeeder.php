<?php

use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_statuses')->insert([
            'room_status'=>'Able',
            'description'=>'Có thể nhận khách',
        ]);
        DB::table('room_statuses')->insert([
            'room_status'=>'In clearing',
            'description'=>'Đang dọn dẹp',
        ]);
        DB::table('room_statuses')->insert([
            'room_status'=>'In renting',
            'description'=>'Đã có khách',
        ]);
        DB::table('room_statuses')->insert([
            'room_status'=>'Unable',
            'description'=>'Đang sửa chữa',
        ]);
    }
}
