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

//        $reservationsPerDay = Reservation::with(['product_id' => function ($query){
//            $query->join('products', 'reservations.product_id', '=', 'products.id');
//        }])->get();


//        $lolz =  Product::selectRaw('COUNT(reservations.id) FROM reservations WHERE reservations.product_id = products.id) countReservations)')->get();
//
//        $count =



        return view ('admin.content', compact('products'));
    }

    public function userShow(){
        $users = User::all();

        return view ('admin.users', compact('users'));
    }

    public function productShow(Product $product){

        // $reservations show all reservations where of product X. It joins to show the users full name instead of a user id etc.
        $reservations = DB::table('reservations')
            ->where('product_id', $product->id)
            ->select(DB::raw("reservations.*, timeslots.*,products.*, users.*, reservations.id as id"))
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            // The joins cause a bug where the reservation id gets replaced by the product id or timeslot id. IF you get rid of the joins, the probem is gone. Adding this select rule fixes it.

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
        $res = Reservation::where('id', '=', $id)->delete();
        return back()->with('res_deleted', 'Reservering verwijderd.');
    }

    public function reservationDeleteAll(Request $request){
        if($request->has('verify')) {
            Reservation::truncate();
            return back()->with('res_deleted_all', 'Alle reserveringen verwijderd.');
        }
        return back();
    }

    public function activeState(Request $request, $id) {

        $product = Product::find($id);

        $product->active = $request->input('active') ? 0:1;

        $product->save();

        return redirect()->route('admin')->with('status', 'Product status bijgewerkt.');

    }

    public function searchStuff(Request $request) {

        if ($request->has('search')){
            $searchInput = $request->get('search');

            $users = User::where('firstname', 'LIKE', '%' . $searchInput . '%')
                    ->orWhere('lastname', 'LIKE', '%' .$searchInput.'%')
                    ->orWhere('housenumber', 'LIKE', '%'.$searchInput.'%')->get();
        }

        return view('admin.users')->with(compact('users'));
    }
}
