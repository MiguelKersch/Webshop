@include('layouts.head')

<body>
    @include('layouts.navbar')

    <h1>products`s</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <a href="/productView/{{$product->id}} " class="btn btn-dark">Product View</a>
                    <a href="{{route('product.addToCart', ['id'=> $product->id])}}" class="btn btn-success">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>