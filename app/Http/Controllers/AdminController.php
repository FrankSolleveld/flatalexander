<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Product;
Use App\User;
use App\Reservation;
Use DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $products = Product::all();

        return view ('admin.content', compact('products'));
    }

    public function userShow(){
        $users = User::all();

        return view ('admin.users', compact('users'));
    }

    public function productShow(Product $product){
        $reservations = DB::table('reservations')
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            ->get();


        return view ('admin.products.show', compact('product', 'reservations'));
    }

    public function reservationShow(Reservation $reservation){
        $reservations = DB::table('reservations')
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            ->get();

        return view ('admin.reservations.summary', compact('reservarion','reservations'));
    }
}
