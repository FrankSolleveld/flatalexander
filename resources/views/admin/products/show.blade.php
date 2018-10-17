@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <p>{{$product->name}}</p>
                    <ul class="list-unstyled">
                        @foreach($reservations as $reservation)

                                @if($reservation->name === $product->name)
                                <li class="list-group-item-light">
                                    {{$reservation->firstname}} {{$reservation->lastname}} van ({{$reservation->housenumber}}) om {{$reservation->timeslot}}
                                </li>
                                    <button class="btn btn-primary">Delete</button>
                                @endif
                        @endforeach
                    </ul>
                        @include('admin.backbutton')

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection