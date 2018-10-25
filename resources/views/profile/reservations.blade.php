@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Overzicht van je huidige reserveringen.</div>

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
                                    <td>
                                        <form method="POST" action="/profile/reservations/{{$reservation->id}}/delete">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" value="{{$reservation->id}}" name="id">

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-user" value="Delete reservation">
                                            </div>
                                        </form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("laundry") }}'">Naar wasschema</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile") }}'">Profiel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
