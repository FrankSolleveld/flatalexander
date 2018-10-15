@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hoi, {{ Auth::user()->firstname }}.
                    <div class="container">

                        @foreach ($products as $product)
                           <br> @include ('reservations.products')
                        @endforeach

                        {{--<table class="table table-hover">--}}
                            {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th></th>--}}

                                    {{--@foreach($allTimeslots as $timeslot)--}}
                                        {{--<th scope="col">{{$timeslot['timeslot']}}</th>--}}
                                    {{--@endforeach--}}
                                {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}

                                    {{--@foreach($products as $product)--}}
                                        {{--<tr>--}}
                                        {{--<th scope="row">{{$product->name}}</th>--}}
                                        {{--@foreach($unavailableTimeslots as $unavailableTimeslot)--}}
                                                {{--<td><button class="btn" >Niet mogelijk</button></td>--}}
                                        {{--@endforeach--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}

                            {{--</tbody>--}}

                        {{--</table>--}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
