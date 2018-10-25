@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reserveringen van vandaag</div>

                    <div class="card-body">
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

                        @include('admin.backbutton')

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection