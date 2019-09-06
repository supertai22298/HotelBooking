<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=>'admin',
            'email'=>'admin@admin.admin',
            'password'=>bcrypt('admin'),
            'role'=>1
        ]);
        DB::table('users')->insert([
            'username'=>'supertai22298',
            'email'=>'admin1@admin.admin',
            'password'=>bcrypt('tai12345'),
            'role'=>0
        ]);
    }
}
