<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            // [
            //     'name'=>'Yatri Bike',
            //     "price"=>"500000",
            //     "description"=>"Yatri bike price in Nepal starts at Rs. 5,65,000 for the most affordable model, P1, and goes up to Rs. 19,49,000 for the most expensive model",
            //     "category"=>"bike",
            //     "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrOBh7Y9NILDSYsjto1KJvKEyZXX7uT0ZAgd7gdg1LDQ&s"
            // ],
            // [
            //     'name'=>'iphone',
            //     "price"=>"1000",
            //     "description"=>"Powerful. Beautiful. Durable. 5G connectivity. Check out the new iPhone 14 Pro, iPhone 14 Pro Max, iPhone 14, iPhone 14 Plus and iPhone SE.",
            //     "category"=>"Mobile",
            //     "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqQSYJ-J6ytO53HBYiMveLk3QkVgaTfloqupoWlG8Mhw&s"
            // ],
            // [
            //     'name'=>'Tesla',
            //     "price"=>"500",
            //     "description"=>"Tesla is accelerating the world's transition to sustainable energy with electric cars",
            //     "category"=>"Car",
            //     "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw0ug3p_8DmHXyMZltsffGvN5GOmVgCWwSvw"
            // ],

        ]);
    }
}