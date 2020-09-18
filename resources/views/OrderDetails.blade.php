@include('layouts.head')

<body>
    @include('layouts.navbar')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>description</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th><a href="/orders"><i class="fas fa-arrow-left"></i></a></th>
                </tr>
            </thead>
            <tbody class>
                @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail->name }}</td>
                    <td>{{ $orderDetail->description }}</td>
                    <td>{{ $orderDetail->pivot->quantity }}</td>
                    <td>{{ $orderDetail->pivot->price }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>