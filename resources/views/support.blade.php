@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Support</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <article>
                        <p>De wooncomissie is te bereiken via onderstaande telefoonnummers:</p>
                        <p>Sociaal beheerder: Frank Smitshoek - 06 29 20 23 82 </p>
                        <p>Technisch beheerder: Frank Solleveld - 06 21 11 08 65</p>
                            <p>wocoalexander@gmail.com</p>
                        </article>

                        {!! Form::open(['route'=>'contactsupport']) !!}

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('Name:') !!}
                            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('Email:') !!}
                            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            {!! Form::label('Message:') !!}
                            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Verstuur</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection