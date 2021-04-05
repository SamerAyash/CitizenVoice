<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function news(){
        return $this->hasMany(News::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

}
