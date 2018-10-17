<?php

namespace App\Http\Controllers;

use App\Product;
use App\Timeslot;
use App\Reservation;
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



        return redirect('laundry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $reservation = new Reservation;
//        $reservation->user_id = Reservation::get(Auth::user()->id);
//        $reservation->product_id = Reservation::get('product_id');
//        $reservation->timeslot_id = Reservation::get('timeslot_id');
//
//        $reservation->save();
//
//
//
//        return redirect('laundry');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {

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
    public function destroy(Reservation $reservation)
    {
        //
    }
}
