<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
