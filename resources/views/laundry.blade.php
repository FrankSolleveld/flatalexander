@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Wasschema - Selecteer je product of bekijk je huidige reserveringen.</div>

                    <div class="card-body">
                        Hoi, {{ Auth::user()->firstname }}.
                    <div class="container">

                        @foreach ($products as $product)
                           <br> @include ('laundry.products')
                        @endforeach

                            <br><button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile_reservations") }}'">Jouw reserveringen</button>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
