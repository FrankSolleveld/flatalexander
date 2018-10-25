@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welkom bij Flat Alexander!</div>

                    <div class="card-body">
                        @if (session('acc_deleted'))
                            <div class="alert alert-success">
                                {{ session('acc_deleted') }}
                            </div>
                        @endif
                        <p>Flat Alexander is een gezellige flat van woningcorporatie Stadswonen aan het Jacob van Campenplein in Rotterdam Alexander. Woningzoekenden kunnen hier informatie over de flat vinden en kunnen zich via Stadswonen inschrijven voor een kamer in deze flat.
                            <br><br>Bewoners kunnen hier informatie vinden over het reilen en zeilen in de flat en het is mogelijk om je in te schrijven voor nieuwsberichten, zodat je altijd van het laatste nieuws op de hoogte bent. Ook kunnen reparatieverzoeken, klachten en vragen aan de beheerders en overige wooncommissieleden doorgegeven worden via het contactformulier.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
