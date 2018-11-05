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
    public function index()
    {
        $user = Auth::user();

        $products = Product::where('active', '=', '1')->get();

        return view('laundry')->with( compact( 'products', 'user' ));
    }

    public function filter(Request $request){

        if ($request->has('filteredProduct')){

            $searchInput = $request->get('filteredProduct');

            $products = Product::where('name', 'LIKE', '%' . $searchInput . '%')->where('active', '=' , '1')->pluck('name', 'id')->get();

            return redirect()->route('laundry')->with(compact( 'products' ));

        }

        return back();

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
        Product::create(request(['name', 'active']));

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

//        dd($product->reservations()->pluck('timeslot_id'));

        $filteredTimeSlots = $filteredTimeSlots->get();
////
//        $filtered = Timeslot::join('laundry', function($join) {
//            $join->on('timeslots.id', '!=', 'laundry.timeslot_id')
//            ->where('laundry.product_id', $product->id);
//        })->get();
//
//        dd($filtered);
//
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
