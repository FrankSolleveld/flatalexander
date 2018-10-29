@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Creeër een nieuw product</div>

                    <div class="card-body">
                        <form method="POST" action="/products">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Product naam</label>
                                <input type="text" class="form-control" id="title" name="name" aria-describedby="emailHelp" placeholder="Voer product naam in" >
                                <input type="hidden" value="1" name="active">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Invoeren</button>
                                @include('admin.backbutton')
                            </div>
                           @include('layouts.errors')
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection