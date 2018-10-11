@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <p>{{$product->name}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection