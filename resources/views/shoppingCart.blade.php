@include('layouts.head')

<body>
    @include('layouts.navbar')
    <h1>Shopping Cart</h1>
    @if(Session::has('cart'))


    <table class="table table-striped">
        <thead class="bg-dark text-light">
            <tr scope="row">
                <td scope="col">Product name</td>
                <td scope="col">Quantity</td>
                <td scope="col">Price</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr scope="row">
                <td>{{ $product['item']['name'] }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a href="{{ route('add', ['id' => $product['item']['id']]) }}"><i class="text-success fas fa-plus"></i></a></td>
                <td><a class="fa fa-trash text-danger" href="{{route('removeItem', $product['item']['id'])}}"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Cost: {{$totalPrice}} Euro</h3>
    <h5><a class="text-dark" href="{{ route('orderStore')}}">Order</a></h5>
    @else
    <h3>Your shopping cart is empty</h3>
    @endif

</body>

</html>