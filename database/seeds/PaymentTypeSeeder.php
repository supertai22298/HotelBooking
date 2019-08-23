<?php

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'payment_type'=>'Payment 1',
            'description'=>'Money',
            'active'=>1
        ]);
        DB::table('payment_types')->insert([
            'payment_type'=>'Payment 2',
            'description'=>'Credit Card',
            'active'=>1
        ]);
        DB::table('payment_types')->insert([
            'payment_type'=>'Payment 3',
            'description'=>'Master card',
            'active'=>1
        ]);
        DB::table('payment_types')->insert([
            'payment_type'=>'Payment 4',
            'description'=>'Else',
            'active'=>1
        ]);
    }
}
