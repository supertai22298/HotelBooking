<?php

use Illuminate\Database\Seeder;
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
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call([
            BookingStatusSeeder::class
        ]);

        factory(User::class, 10)->create();
        //factory(User::class, 10)->create();

        factory(Hotel::class, 10)->create();

        $this->call([
            RoomTypeSeeder::class
        ]);

        $this->call([
            PaymentTypeSeeder::class
        ]);
        
        $this->call([
            PaymentStatusSeeder::class
        ]);

        $this->call([
                RateTypeSeeder::class
            ]);

        factory(Message::class,20)->create();

        $this->call([
            RoomStatusSeeder::class
        ]);
        factory(Blog::class,30)->create();
       
        $this->call([
            HotelUtilitySeeder::class
        ]);
        
        // $this->call([
        //     HotelUtilitySeeder::class
        // ]);

        // $this->call([
        //     ProfileSeeder::class
        // ]);

        

    }
}