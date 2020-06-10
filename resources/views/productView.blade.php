@include('layouts.head')

<body>
    @include('layouts.navbar')
    <h1>products`s</h1>
    <table class="table table-striped">
        <thead class="bg-dark text-light">
            <tr scope="row">
                <td scope="col">Name</td>
                <td><a class="text-light nav-link" href="/product/{{$product->category_id}}"><i class="fas fa-arrow-left"></i></a></td></td>
            </tr>
        </thead>
        <tbody>
            <tr scope="row">
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
            </tr>
        </tbody>
    </table>
</body>