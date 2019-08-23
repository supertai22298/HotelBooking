<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
Use App\Hotel;
Use App\HotelUtillity;
Use App\Message;
Use App\Payment;
Use App\PaymentStatus;
Use App\PaymentType;
Use App\Rate;
Use App\RateType;
Use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;
use Faker\Generator as Faker;

// $factory->define(Profile::class, function (Faker $faker) {
//     $jsonString = file_get_contents('database/factories/data.json');
//     $data = json_decode($jsonString,false);
//     $firstname=$data->firstName[rand(0,count($data->firstName)-1)];
//     $lastname=$data->lastName[rand(0,count($data->lastName)-1)];
//     //$fullname = $data->lastName[rand(0,count($data->lastName)-1)].''.$data->firstName[rand(0,count($data->firstName)-1)];
//     $address=$data->address[rand(0,count($data->address)-1)];
//     //$username = strtolower(str_replace('','',$fullname).rand(1,1000));

//     return [
//         'user_id' => '1',
//         'date_of_birth'=> '12/12/2012',
//         'city'=> 'asdas',
//         'country'=> 'asdas',
//         'first_name'=> $firstname,
//         'last_name'=> $lastname,
//         'address'=> $address
//     ];
// });

$factory->define(User::class, function (Faker $faker) {
    $jsonString = file_get_contents('database/factories/data.json');
    $data = json_decode($jsonString,false);
    $username = $data->username[rand(0,count($data->username)-1)].rand(0,999);
    $email= $username.'@gmail.com';
    $password=bcrypt($username);
    $role=rand(0,1);

    return[
        'username'  => $username,
        'email'     =>$email,
        'password'  =>$password,
        'role'      =>$role
    ];
});

$factory->define(Hotel::class, function (Faker $faker) {
    $jsonString = file_get_contents('database/factories/data.json');
    $data       = json_decode($jsonString,false);
    $hotelstar  =rand(0,10);
    $name       =$faker->company;
    $motto      ='Welcome to'.$name.'this is our motto';
    $address    = $faker->address;
    $city       = $faker->city;
    $country    =  $faker->country;
    $main_phone_number =$faker->phoneNumber ;
    $toll_free_number = $faker->tollFreePhoneNumber;
    $company_email_address = str_replace('','',str_replace('.','',$name)).'@gmail.com';
    $website_address=   str_replace('','',$name).'.com';
    $image= $faker->image;

    return[
        'hotel_star'  => $hotelstar,
        'name'     =>$name,
        'motto'  =>$motto,
        'address'      =>$address,
        'city'      =>$city,
        'country'   =>$country,
        'main_phone_number'=>$main_phone_number,
        'toll_free_number'=>$toll_free_number,
        'company_email_address'=>$company_email_address,
        'website_address'=>$website_address,
        'image'=>$image,
        'image_link'=>"Chưa có!"
    ];
});

$factory->define(Message::class, function (Faker $faker) {
    $jsonString = file_get_contents('database/factories/data.json');
    $data       = json_decode($jsonString,false);
    $name = $faker->name;  
    return[
        'name'  =>$name,
        'email' =>str_replace(' ','',str_replace('.','',$name)).'@gmail.com',
        'message'=>$faker->sentence($nbWords = 10, $variableNbWords = true)
    ]; 
});

$factory->define(Blog::class, function (Faker $faker) {
    $jsonString = file_get_contents('database/factories/data.json');
    $data       = json_decode($jsonString,false);
    return[
        'title' =>$faker->sentence($nbWords = 7, $variableNbWords = true),
        'author' =>$faker->name,
        'description'   =>$faker->text($maxNbChars = 190),
        'active'    =>1,
        'image'     =>$faker->image
        
    ]; 
});

// $factory->define(Profile::class, function (Faker $faker) {
//     // $jsonString = file_get_contents('database/factories/data.json');
//     // $data       = json_decode($jsonString,false);
//     return[
//         'user_id'       =>
//         'first_name'    =>$faker->firstName,
//         'last_name'     =>$faker->lastName,
//         'address'       =>$faker->address,
//         'city'          =>$faker->city,
//         'country'       =>$faker->country,
//         'cellular_phone_number'  =>$faker->phoneNumber
        
//     ]; 
// });







