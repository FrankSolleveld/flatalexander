<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public function reservation() {

        return $this->hasOne(Reservation::class);

    }

}
