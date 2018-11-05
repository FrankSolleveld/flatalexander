<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">Product ID</th>
        <th scope="col">Product Naam</th>
        <th scope="col">Status</th>
        <th scope="col">Reserveringen per dag</th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
            @if($product->active === 1)
                <td>Actief</td>
            @elseif($product->active === 0)
                <td>Non-actief</td>
            @endif
            {{--<td>{{$reservationPerDay}}</td>--}}
            <td>{!! Form::open(['action' => ['AdminController@activeState', $product->id], 'method' => 'POST', 'onsubmit' => "return confirm('Weet je zeker dat je de status wilt wijzigen? Reserveringen van dit product worden verwijdert.');"]) !!}
            @method('PUT')
            {{Form::hidden('active', $product->active)}}
            {{Form::submit($product->active ? 'Deactiveer': 'Activeer', ['class'=>($product->active ? 'btn-outline-danger':'btn-outline-primary')])}}
                {!! Form::close() !!}</td>
        </tr>

    @endforeach
    </tbody>
</table>