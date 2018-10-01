<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    public function user(){
        return $this->hasMany('App\User');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function timeslot(){
        return $this->hasMany('App\Timeslot');
    }
}
