<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arabic_array=['المياه','الكهرباء','أخرى'];
        $english_array=['Water','Electricity','Others'];

        for ($i=0; $i < count($arabic_array);$i++){
            \App\Category::create([
                'name_ar'=>$arabic_array[$i],
                'name_en'=>$english_array[$i],
            ]);
        }

    }
}
