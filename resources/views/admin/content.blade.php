@extends('layouts.layout')

@section('content')

@section('content')
    <div id="row">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin paneel</div>

                    <div class="card-body">
                      <p>Je kunt hier verscheidene dingen doen, waaronder het aanmaken van producten, het wijzigen van producten en het verwijderen van producten. Dit geldt ook voor gebruikers. Ook krijg je een overzicht te zien van het wasschema en kun je zien wie wat voor reservering geplaatst heeft. </p>
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("create-prod") }}'">Product aanmaken</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

