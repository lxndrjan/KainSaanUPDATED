<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, FoodEstablishment, Food, FoodEstablishmentImage, FoodImage};
use Faker\Generator;

class FoodEstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $address = ['lat'=> 11.2543,'lng'=> 124.9617];

        $user = User::create([
            'email'    => $faker->email,
            'password' => '123123',
            'role_id'  => 2
        ]);

        $foodEstablishment = FoodEstablishment::create([
            'user_id'           => $user->id,
            'store_name'        => 'Kain Saan',
            'coords'            => $address,
            'address'           => 'Bacoor, Cavite',
            'category'          => 'Fast Food Chain',
            'cuisine_type'      => 'Filipino',
            'parking_info'      => 'No Info',
            'average_cost'      => '50',
            'store_description' => 'Kain Saan combines flavors & inspiration from the Far East & the West to create what we think is the best! Home to the original tapsilog, we specialize in pizzas, as well as handmade appetizers, sandwiches, salads, and gluten friendly, vegetarian, & vegan selections. Feel free to indulge in a tiki drink or craft beer with our fantastic unique cuisine. Cheers!'
        ]);

        $food = Food::create([
            'food_establishment_id' => $foodEstablishment->id,
            'food_name'             => 'Tapsilog',
            'price'                 => '105',
            'category'              => 'Main Dish'
        ]);

        FoodEstablishmentImage::create([
            'file_name'             => 'foodestimage.jpg',
            'file_path'             => 'http://127.0.0.1:8000/storage/food-establishment/foodestimage.jpg',
            'food_establishment_id' => $foodEstablishment->id,
        ]);

        FoodImage::create([
            'file_name' => 'tapsilog.jpg',
            'file_path' => 'http://127.0.0.1:8000/storage/food/tapsilog.jpg',
            'food_id'   => $food->id,
        ]);

        $foodEstablishment = FoodEstablishment::create([
            'store_name'        => 'McDonalds',
            'coords'            => $address,
            'address'           => 'Bacoor, Cavite',
            'category'          => 'Fast Food Chain',
            'cuisine_type'      => 'Filipino',
            'parking_info'      => 'No Info',
            'average_cost'      => '50',
            'store_description' => 'McDonalds combines flavors & inspiration from the Far East & the West to create what we think is the best! Home to the original tapsilog, we specialize in pizzas, as well as handmade appetizers, sandwiches, salads, and gluten friendly, vegetarian, & vegan selections. Feel free to indulge in a tiki drink or craft beer with our fantastic unique cuisine. Cheers!'
        ]);

        $food = Food::create([
            'food_establishment_id' => $foodEstablishment->id,
            'food_name'             => 'Tapsilog',
            'price'                 => '45',
            'category'              => 'Main Dish'
        ]);

        FoodEstablishmentImage::create([
            'file_name'             => 'foodestimage.jpg',
            'file_path'             => 'http://127.0.0.1:8000/storage/food-establishment/foodestimage.jpg',
            'food_establishment_id' => $foodEstablishment->id,
        ]);

        FoodImage::create([
            'file_name' => 'tapsilog.jpg',
            'file_path' => 'http://127.0.0.1:8000/storage/food/tapsilog.jpg',
            'food_id'   => $food->id,
        ]);

        $foodEstablishment = FoodEstablishment::create([
            'store_name'        => 'Wendys',
            'coords'            => $address,
            'address'           => 'Bacoor, Cavite',
            'category'          => 'Fast Food Chain',
            'cuisine_type'      => 'Filipino',
            'parking_info'      => 'No Info',
            'average_cost'      => '50',
            'store_description' => 'Wendys combines flavors & inspiration from the Far East & the West to create what we think is the best! Home to the original tapsilog, we specialize in pizzas, as well as handmade appetizers, sandwiches, salads, and gluten friendly, vegetarian, & vegan selections. Feel free to indulge in a tiki drink or craft beer with our fantastic unique cuisine. Cheers!'
        ]);

        $food = Food::create([
            'food_establishment_id' => $foodEstablishment->id,
            'food_name'             => 'Tapsilog',
            'price'                 => '25',
            'category'              => 'Main Dish'
        ]);

        FoodEstablishmentImage::create([
            'file_name'             => 'foodestimage.jpg',
            'file_path'             => 'http://127.0.0.1:8000/storage/food-establishment/foodestimage.jpg',
            'food_establishment_id' => $foodEstablishment->id,
        ]);

        FoodImage::create([
            'file_name' => 'tapsilog.jpg',
            'file_path' => 'http://127.0.0.1:8000/storage/food/tapsilog.jpg',
            'food_id'   => $food->id,
        ]);
    }
}
