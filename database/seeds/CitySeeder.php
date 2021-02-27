<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arabic_array=['غزة','النصيرات','المغازي','الزوايدة','دير البلح','خان يونس','رفح'];
        $english_array=['Gaza','Nuseirat','Maghazi','Zuwaida','Dair Al Balah','Khan Younes','Rafah'];

        for ($i=0; $i < count($arabic_array);$i++){
            \App\City::create([
                'name_ar'=>$arabic_array[$i],
                'name_en'=>$english_array[$i],
            ]);
        }
    }
}
