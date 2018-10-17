<?php

namespace App\Http\Controllers;

use App\Product;
use App\Reservation;
use Illuminate\Http\Request;
Use DB;
use App\Timeslot;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $res = Reservation::all();

        $unavailableTimeslots = DB::table('reservations')
            ->join('timeslots', 'reservations.timeslot_id', '=', 'timeslots.id')
            ->join('products', 'reservations.product_id', '=', 'products.id')
            ->get();

        $allTimeslots = Timeslot::all();

        $products = Product::all();
        return view('laundry', compact('res', 'products', 'allTimeslots', 'unavailableTimeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:5'
        ]);
        Product::create(request(['name']));

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reservations = Reservation::where('product_id', $product->id)->get();

        $filteredTimeSlots = DB::table('timeslots');

        foreach ($reservations as $reservation)
        {
            $filteredTimeSlots->where('id', '!=', $reservation->timeslot_id);
        }

        $filteredTimeSlots = $filteredTimeSlots->get();
//
//        $filtered = Timeslot::join('laundry', function($join) {
//            $join->on('timeslots.id', '!=', 'laundry.timeslot_id')
//            ->where('laundry.product_id', $product->id);
//        })->get();
//
//        dd($filtered);

//        dd($filteredTimeSlots);
        return view ('laundry.show', compact('product', 'filteredTimeSlots', 'timeslots', 'timeslotsRemaining'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
