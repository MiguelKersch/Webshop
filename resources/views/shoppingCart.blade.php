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
            @foreach($cartDetails->items as $product)
            <tr scope="row">
                <td>{{ $product['item']['name'] }}</td>
                    <td>
                        <form action="{{ route('shoppingCart.update', $product['item']['id']) }}" method="POST">
                        @csrf
                            <input id="quantityInput" class="quantityInput" name="quantityInput" type="number" size="20" value="{{ $product['quantity'] }}">
                            <input class="btn btn-primary" type="submit" value="Apply" >
                        </form>
                    </td>
                <td>{{ $product['price'] }}</td>
                <td><a class="fa fa-trash text-danger" href="{{route('removeItem', $product['item']['id'])}}"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Cost: {{ $cartDetails->getTotalPrice() }} Euro</h3>
    <h5><a class="text-dark" href="{{ route('orderStore')}}">Order</a></h5>
    @else
    <h3>Your shopping cart is empty</h3>
    @endif

</body>

</html>