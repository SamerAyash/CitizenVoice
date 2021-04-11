<?php

use Illuminate\Database\Seeder;
use \App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CitySeeder::class,CategorySeeder::class,OrderStatusSeeder::class,AdminSeeder::class]);

        User::create([
            'birthdate'=> '1997-11-02',
            'name'=> 'طارق',
            'id_number'=> 2223335558,
            'email' => 'tariq@gmail.com',
            'phone'=> '0598888888',
            'password'=> \Illuminate\Support\Facades\Hash::make('12345678'),
            'city_id'=> 1,
        ]);

        foreach (\App\City::all() as $city){
            factory(\App\User::class,15)->create([
                'city_id'=> $city->id,
            ]);
        }

        factory(\App\News::class,50)->create();
        factory(\App\Order::class,50)->create();
    }
}
