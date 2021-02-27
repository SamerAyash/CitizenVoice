<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\City::all() as $city){
            factory(\App\Admin::class)->create([
                'city_id'=> $city->id,
                'type'=> 1,
            ]);

            factory(\App\Admin::class,5)->create([
                'city_id'=> $city->id,
            ]);
        }

    }
}
