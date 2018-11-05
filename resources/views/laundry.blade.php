@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Wasschema - Selecteer je product of bekijk je huidige reserveringen.</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($user->isAuthorized === 1)
                        Hoi, {{ Auth::user()->firstname }}.
                    {{--<div class="container">--}}

                        {{--<!-- Form select werkt niet met dropdown en hierdoor heb ik geen filter kunnen maken -->--}}
                        {{--{!! Form::open(['action' => 'ProductsController@filter', 'method' => 'GET']) !!}--}}
                        {{--<div class="form-group">--}}

                            {{--{{Form::token()}}--}}

                        {{--{{ Form::select('filteredProduct', [--}}
                        {{--'laundry' => 'Wasmachine',--}}
                        {{--'dryer' => 'Droger'--}}
                        {{--], null, ['placeholder' => 'Kies een categorie van het apparaat.' ,'class' => 'form-control form-group']) }}--}}

                        {{--{{Form::submit('Submit de filter.', ['class' => 'btn btn-primary'])}}--}}

                        {{--{!! Form::close() !!}--}}
                        {{--</div>--}}
                        {{--<form>--}}
                          {{----}}
                            {{--<div class="form-group">--}}
                                {{--<label for="productSelect">Selecteer een product</label>--}}
                                {{--<select class="form-control" id="productSelect" name="filteredProduct">--}}
                                    {{--<option>Wasmachines</option>--}}
                                    {{--<option>Drogers</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</form>--}}


                        @foreach ($products as $product)
                           <br> @include ('laundry.products')
                        @endforeach

                            <br><button type="button" class="btn btn-primary btn-sm" onclick=" window.location='{{ route("profile_reservations") }}'">Jouw reserveringen</button>
                        @elseif($user->isAuthorized === 0)
                            <p>Helaas kun je deze pagina nog niet betreden. Neem contact op met de wooncommissie om je toegang te verkrijgen. Dit kan door een mail te sturen die je vind bij de Support pagina.</p>
                        @endif
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
