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
            ->orderBy('timeslots.timeslot')
            ->get();

        return view ('admin.reservations.summary', compact('reservarion','reservations'));
    }

    public function reservationDelete($id){

        $res = Reservation::where('reservation_id', '=', $id)->delete();

        return redirect()->route('admin')->with('res_deleted', 'Reservering verwijderd.');
    }

    public function activeState(Request $request, $id) {

        $product = Product::find($id);

        $product->active = $request->input('active') ? 0:1;

        $product->save();

        return redirect()->route('admin')->with('status', 'Product status bijgewerkt.');

    }
}
