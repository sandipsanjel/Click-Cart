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
            [
                'name'=>'Yatri Bike',
                "price"=>"500000",
                "description"=>"Yatri bike price in Nepal starts at Rs. 5,65,000 for the most affordable model, P1, and goes up to Rs. 19,49,000 for the most expensive model",
                "category"=>"bike",
                "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrOBh7Y9NILDSYsjto1KJvKEyZXX7uT0ZAgd7gdg1LDQ&s"
            ],
            // [
            //     'name'=>'Panasonic Tv',
            //     "price"=>"400",
            //     "description"=>"A smart tv with much more feature",
            //     "category"=>"tv",
            //     "gallery"=>"https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg"
            // ],
            // [
            //     'name'=>'Soni Tv',
            //     "price"=>"500",
            //     "description"=>"A tv with much more feature",
            //     "category"=>"tv",
            //     "gallery"=>"https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png"
            // ],
            // [
            //     'name'=>'LG fridge',
            //     "price"=>"200",
            //     "description"=>"A fridge with much more feature",
            //     "category"=>"fridge",
            //     "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU"
            //  ]
        ]);
    }
}