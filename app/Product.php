<?php

namespace App;

class Product extends Model
{
    public function reservations() {

        return $this->hasMany(Reservation::class);

    }
}
