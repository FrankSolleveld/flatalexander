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
                        @foreach($filteredTimeSlots as $timeslot)
                            <button value="{{$timeslot->id}}"class="list-group-item available-products">{{$timeslot->timeslot}}</button>
                        @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection