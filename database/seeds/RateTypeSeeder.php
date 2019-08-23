<?php

use Illuminate\Database\Seeder;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rate_types')->insert([
            'rate_type'=>'Very bad',
            'description'=>'This is very bad quality',
            'active'=>1
        ]);

        DB::table('rate_types')->insert([
            'rate_type'=>'Bad',
            'description'=>'This is bad quality',
            'active'=>1
        ]);

        DB::table('rate_types')->insert([
            'rate_type'=>'Normal',
            'description'=>'Need to improve the quality',
            'active'=>1
        ]);

        DB::table('rate_types')->insert([
            'rate_type'=>'Good',
            'description'=>'It is good',
            'active'=>1
        ]);

        DB::table('rate_types')->insert([
            'rate_type'=>'Perfect',
            'description'=>'Perfect quality',
            'active'=>1
        ]);
    }
}
