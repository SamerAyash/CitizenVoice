<?php

use Illuminate\Database\Seeder;
use \App\User;
use \Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(!File::exists(public_path() . '/storage/images')){
            File::makeDirectory(public_path() . '/storage/images',0755,true);
        }
        if(!File::exists(public_path() . '/storage/files')){
            File::makeDirectory(public_path() . '/storage/files',0755,true);
        }
        if(!File::exists(public_path() . '/storage/profiles')){
            File::makeDirectory(public_path() . '/storage/profiles',0755,true);
        }

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

        \App\Admin::create([
            'name'=> 'محمود',
            'id_number'=> 2223335558,
            'email' => 'moh@gmail.com',
            'phone'=> '0598888888',
            'type'=> 1,
            'password'=> \Illuminate\Support\Facades\Hash::make('12345678'),
            'city_id'=> 1,
        ]);

        \App\Admin::create([
            'name'=> 'محمود',
            'id_number'=> 2223335588,
            'email' => 'moh2@gmail.com',
            'phone'=> '0598888889',
            'type'=> 2,
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
