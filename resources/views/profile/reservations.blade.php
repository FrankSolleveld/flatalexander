@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Overzicht van je uidige reserveringen.</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Reserverings ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Tijdsslot</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td scope="row">{{$reservation->id}}</td>
                                    <td>{{$reservation->name}}</td>
                                    <td>{{$reservation->timeslot}}</td>
                                    <td><button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("reservation_delete") }}'">Verwijder</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
