<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function news(){

        return $this->hasMany(News::class);
    }

    public function user(){

        return $this->hasMany(User::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function admin(){
        return $this->hasMany(Admin::class);
    }
}
