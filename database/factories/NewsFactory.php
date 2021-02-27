<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=> $faker->text,
        'description'=> $faker->paragraph,
        'image'=> $faker->image('public/storage/images',640,480, null, false),
        'city_id'=> \App\City::all()->random()->id,
        'admin_id'=> \App\Admin::all()->random()->id,
    ];
});
