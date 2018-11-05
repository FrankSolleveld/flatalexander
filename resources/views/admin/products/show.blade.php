@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$product->name}}</div>

                    <div class="card-body">
                        @if (session('res_deleted'))
                            <div class="alert alert-success">
                                {{ session('res_deleted') }}
                            </div>
                        @endif
                        <p>Zie je een lege pagina? Dan zijn er voor {{$product->name}} geen reserveringen geplaatst.</p>
                    <ul class="list-unstyled">

                        @foreach($reservations as $reservation)
                            {!! Form::open(['action' => ['AdminController@reservationDelete', $reservation->id], 'method' => 'POST']) !!}
                            {{--<form method="POST" action="/products/res/{{$reservation->id}}">--}}
                                @method('DELETE')
                                @if($reservation->name === $product->name)
                                <li class="list-group-item">
                                    {{$reservation->firstname}} {{$reservation->lastname}} van ({{$reservation->housenumber}}) om {{$reservation->timeslot}}
                                        {{--<input type="hidden" value="{{$reservation->id}}" name="res_id">--}}
                                    {{Form::hidden('res_id', $reservation->id)}}

                                        <div class="form-group">
                                            {{--<input type="submit" class="btn btn-danger delete-user" value="Delete reservation">--}}
                                            {{Form::submit('Delete reserveringen', ['class'=>'btn btn-danger delete-user'])}}
                                        </div>
                                    {!! Form::close() !!}
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