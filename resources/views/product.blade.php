@include('layouts.head')

<body>
    @include('layouts.navbar')
    <h1>{{$category->name}}</h1>
    <h1>products`s</h1>
    <table class="table table-striped">
        <thead class="bg-dark text-light">
            <tr scope="row">
                <td scope="col">Name</td>
                <td><a class="text-light nav-link" href="/category/"><i class="fas fa-arrow-left"></i></a></td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr scope="row">
                <td>{{ $product->name }}</td>
                <td><a class="text-dark nav-link" href="/productView/{{ $product->id }}"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>