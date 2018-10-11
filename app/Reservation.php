<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    public function user(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function timeslot(){
        return $this->hasMany(Timeslot::class);
    }
}
