<?php

namespace App;

class Product extends Model
{
    public function reservation() {

        return $this->belongsTo('App\Reservation');

    }
}
