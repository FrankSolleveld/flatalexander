@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Je profiel</div>

                    <div class="card-body">
                       Test
                        <button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile_edit") }}'">Gegevens bewerken</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
