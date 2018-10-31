@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="search-form">
            {!! Form::open(['action' => ['AdminController@searchStuff'], 'method' => 'GET']) !!}
            @method('GET')
            {{Form::text('search', '')}}
            {{Form::submit('Zoek', ['class' => 'btn-primary',])}}
            {!! Form::close() !!}
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">USER ID</th>
            <th scope="col">Administrator</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Huisnummer</th>

        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user->id}}</td>
                    @if($user->isAdmin === 1)
                        <td>Ja</td>
                    @else
                        <td>Nee</td>
                    @endif
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->housenumber}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <div class="col-sm-5">@include('admin.backbutton')</div>
    </div>
@endsection