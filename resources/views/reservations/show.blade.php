@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Klik hieronder op een tijd om deze machine te reserveren.</div>

                    <div class="card-body">

                        @foreach($timeslotsRemaining as $timeslot)
                            <li>{{$timeslot->timeslot}}</li>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection