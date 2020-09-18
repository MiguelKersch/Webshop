@include('layouts.head')

<body>
    @include('layouts.navbar')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order number</th>
                    <th>Price</th>
                    <th>Order date</th>
                </tr>
            </thead>
            <tbody class>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="/orderDetails/{{ $order->id }}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>