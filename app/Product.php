<?php

namespace App;

class Product extends Model
{
    public $fillable = ['name'];

    public function reservations() {

        return $this->hasMany(Reservation::class);

    }
}
