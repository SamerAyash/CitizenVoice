<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'title'=> $faker->text,
        'description'=> $faker->paragraph,
        'file'=> $faker->image('public/storage/images',640,480, null, false),
        'feedback'=> $faker->randomElement([$faker->text,null]),
        'city_id'=> \App\City::all()->random()->id,
        'status_id'=> \App\OrderStatus::all()->random()->id,
        'category_id'=> \App\Category::all()->random()->id,
        'admin_id'=> \App\Admin::where('type',1)->get()->random()->id,
        'user_id'=> \App\User::all()->random()->id,
    ];
});
