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
                            <form method="POST" action="/products/res/{{$reservation->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                @if($reservation->name === $product->name)
                                <li class="list-group-item">
                                    {{$reservation->firstname}} {{$reservation->lastname}} van ({{$reservation->housenumber}}) om {{$reservation->timeslot}}
                                        <input type="hidden" value="{{$reservation->id}}" name="res_id">

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger delete-user" value="Delete reservation">
                                        </div>
                                    </form>
                                </li>

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