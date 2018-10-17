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
                           <br> @include ('laundry.products')
                        @endforeach

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
