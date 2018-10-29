<?php

namespace App\Http\Controllers;

use App\Product;
use App\Timeslot;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;
use DB;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Reservation::all();

        $unavailableTimeslots = DB::table('reservations')
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            ->get();

        $allTimeslots = Timeslot::all();

        $products = Product::all();
        return view('reservations', compact('res', 'products', 'allTimeslots', 'unavailableTimeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservation = new Reservation;
        $reservation->user_id = Request::get('user_id');
        $reservation->product_id = Request::get('product_id');
        $reservation->timeslot_id = Request::get('timeslot_id');

        $reservation->save();

        return redirect('laundry')->with('success','Reservering succesvol gemaakt.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $user = Auth::user();
        $reservations = DB::table('reservations')->where('user_id', $user->id)
            ->select('reservations.*')
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            // The joins cause a bug where the reservation id gets replaced by the product id or timeslot id. IF you get rid of the joins, the probem is gone. Adding this select rule fixes it.
            ->select(DB::raw("reservations.*, timeslots.*,products.*, reservations.id as id"))

            ->get();

        return view('profile.reservations')->with (compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $id = Request::get('id');


        $res = Reservation::where('id', '=', $id)->delete();

        return redirect()->route('profile_reservations')->with('res_deleted', 'Reservering verwijderd.');
    }
}
