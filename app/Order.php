<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
