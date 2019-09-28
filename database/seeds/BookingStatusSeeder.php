<?php

use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_statuses')->insert([
            'booking_status'=>'Đã xác nhận',
            'ative'=>1
        ]);
        
        DB::table('booking_statuses')->insert([
            'booking_status'=>'Chưa xác nhận',
            'ative'=>1
        ]);

        DB::table('booking_statuses')->insert([
            'booking_status'=>'Đã hủy',
            'ative'=>1
        ]);
      
    }
}
