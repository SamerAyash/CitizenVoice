<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'id_number'=>$faker->unique()->numberBetween(1111111111,9999999998),
        'email' => $faker->unique()->safeEmail,
        'phone'=> $faker->unique()->phoneNumber,
        'type'=> 2,
        'password'=> \Illuminate\Support\Facades\Hash::make('12345678'),
    ];
});
