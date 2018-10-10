<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // Guarded sluit de dingen uit die je sowieso niet mee wilt nemen in je database. Nu is het zo dat in ProductsController specifiek 'name' is verwacht. Dus dit is zo veilig.
    // Elk Model die gebruik maakt van dit Model krijgt gelijk deze beveiliging.
    protected $guarded = [];
}
