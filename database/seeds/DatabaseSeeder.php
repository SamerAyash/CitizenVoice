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
        foreach (\App\City::all() as $city){
            factory(\App\User::class,15)->create([
                'city_id'=> $city->id,
            ]);
        }

        factory(\App\News::class,50)->create();
        factory(\App\Order::class,50)->create();
    }
}
