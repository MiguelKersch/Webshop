@include('layouts.head')

<body>
    @include('layouts.navbar')

    <h1>products`s</h1>
    <h2>{{ $category->name }}</h2>
    <div class="row">
        @foreach($product->products as $products)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                 <div class="card-body">
                    <h5 class="card-title">{{ $products->name }}</h5>
                    <a href="/productView/{{$products->id}} " class="btn btn-dark">Product View</a>
                    <a href="{{route('product.addToCart', ['id'=> $products->id])}}" class="btn btn-success">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body> 