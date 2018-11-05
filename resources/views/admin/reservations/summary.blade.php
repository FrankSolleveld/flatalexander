@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reserveringen van vandaag</div>

                    <div class="card-body">
                        @if (session('res_deleted_all'))
                            <div class="alert alert-success">
                                {{ session('res_deleted_all') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Res ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Tijdslot</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->firstname}} {{$reservation->lastname}} </td>
                                    <td>{{$reservation->id}}</td>
                                    <td>{{$reservation->name}}</td>
                                    <td>{{$reservation->timeslot}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <p>Wil je alle reserveringen verwijderen voor de dag van morgen? Dat kan via de rode knop.</p>
                        {!! Form::open(['action' => ['AdminController@reservationDeleteAll' , Auth::user()->id], 'method' => 'POST']) !!}
                        @method('DELETE')

                        {{Form::hidden('verify' , Auth::user()->id)}}
                        {{Form::submit('Delete reservering', ['class'=>'btn btn-danger delete-user'])}}

                        @include('admin.backbutton')

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection