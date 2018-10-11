@extends('layouts.layout')

@section('content')
    <h1>Reserveringen</h1>
    <p>
{{--        {{dd($res->product)}}--}}
    </p>
    <p>
        {{dd($product->reservations()->first())}}
    </p>
@endsection