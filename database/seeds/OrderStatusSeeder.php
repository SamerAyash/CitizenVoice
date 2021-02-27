<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arabic_array=['في الإنتظار','قُبل','رُفض','تم الحل'];
        $english_array=['On hold','Accepted','Refused','Solved'];

        for ($i=0; $i < count($arabic_array);$i++){
            \App\OrderStatus::create([
                'name_ar'=>$arabic_array[$i],
                'name_en'=>$english_array[$i],
            ]);
        }
    }
}
