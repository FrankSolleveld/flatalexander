@extends('layouts.layout')

@section('content')
    <table class="table">
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
                    <th scope="row">{{$user->id}}</th>
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

    @include('admin.backbutton')
@endsection