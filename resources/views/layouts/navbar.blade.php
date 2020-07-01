<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 ">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="text-light nav-link" href="{{ url('/category') }}">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/category') }}">Link</a>
            </li>
            <li class="nav-item">


            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Webshop</a>
    </div>
    @if (Route::has('login'))
    <div class="navbar-collapse collapse w-100 order-3">
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="text-light nav-link" href="{{ url('shoppingCart') }}">Shopping Cart <span class='badge badge-light'>{{Session::has('cart') ? Session::get('cart')-> totalQuantity : ''}}</span></a>
            </li>
            <li class="nav-item">
                <a class="text-light nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            @else
            <li class="nav-item">
                <a class="text-light nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="text-light nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
        </ul>
    </div>
    @endif
    @endauth
</nav>