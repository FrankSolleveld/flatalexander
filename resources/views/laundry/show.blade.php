@extends('layouts.layout')

@section('content')
    <link ref="{{asset("css/products.css")}}" type="text/css"/>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Klik hieronder op een tijd om deze machine te reserveren.</div>

                    <div class="card-body">
                        <ul class="list-unstyled">
                            <form method="POST" action="/laundry/reserve">
                                {{ csrf_field() }}
                            <div id="form-group">
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        @foreach($filteredTimeSlots as $timeslot)
                                <button value="{{$timeslot->id}}"type="submit" class="btn btn-primary" name="timeslot_id">{{$timeslot->timeslot}}</button><br>
                        @endforeach
                            </div>
                                @include('layouts.errors')
                            </form>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection