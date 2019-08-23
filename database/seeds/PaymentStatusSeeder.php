<?php

use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insert([
            'payment_status'=>'Not Payed',
            'description'=>'This room is not payed',
            'active'=>1
        ]);

        DB::table('payment_statuses')->insert([
            'payment_status'=>'Payed',
            'description'=>'This room is payed',
            'active'=>1
        ]);

        DB::table('payment_statuses')->insert([
            'payment_status'=>'Payed a haft',
            'description'=>'This room is payed a haft',
            'active'=>1
        ]);

        DB::table('payment_statuses')->insert([
            'payment_status'=>'Payed a part',
            'description'=>'This room is payed a part',
            'active'=>1
        ]);
    }
}
