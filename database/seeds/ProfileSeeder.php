<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user=User::all();
        for($i=1;$i<=count($user);$i++){
            DB::table('profiles')->insert([
                'user_id'=>$i,
                'first_name'    =>$faker->firstName($gender = null|'male'|'female'),
                'last_name'     =>$faker->lastName,
                'address'       =>$faker->address,
                'city'          =>$faker->city,
                'country'       =>$faker->country,
                'cellular_phone_numer'  =>$faker->phoneNumber
                ]);
        }
        
        // $i=1;
        // foreach (range(1,50) as $index) {
        //     DB::table('profiles')->insert([
        //     'user_id' => $i
        //     ]);
        //     $i++;
        // }  
    }
}
