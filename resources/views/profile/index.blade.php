@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Je profiel</div>

                    <div class="card-body">

                            @if (session('profile_updated'))
                                <div class="alert alert-success">
                                    {{ session('profile_updated') }}
                                </div>
                            @endif

                        <p>Je naam is {{Auth::user()->firstname}}</p>
                       Je kunt hier je gegevens bewerken en je reserveringen  inzien en verwijderen.<br>
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile_edit") }}'">Gegevens bewerken</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile_reservations") }}'">Jouw reserveringen</button>

                        <!-- Optie tot verwijderen van je account! -->
                            <form method="POST" action="/profile/{{$user->id}}/delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" value="{{$user->id}}" name="id">

                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete Account" onclick="return confirm('Weet je zeker dat je je account wilt verwijderen? Flat Alexander is niet aansprakelijk voor verlies van data.')">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
