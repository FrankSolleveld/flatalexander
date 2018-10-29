<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">Product ID</th>
        <th scope="col">Product Naam</th>
        <th scope="col">Status</th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
            <td>{{$product->active}}</td>
            <td>{!! Form::open(['action' => ['AdminController@activeState', $product->id], 'method' => 'POST']) !!}
            @method('PUT')
            {{Form::hidden('active', $product->active)}}
            {{Form::submit($product->active ? 'Deactiveer': 'Activeer', ['class'=>($product->active ? 'btn-outline-danger':'btn-outline-primary')])}}
                {!! Form::close() !!}</td>
        </tr>

    @endforeach
    </tbody>
</table>