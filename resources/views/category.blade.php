@include('layouts.head')

<body>
    @include('layouts.navbar')

    <h1>Category`s</h1>
    <table class="table table-striped">
        <thead class="bg-dark text-light">
            <tr scope="row">
                <td scope="col">Id</td>
                <td scope="col">Name</td>
                <td scope="col">Description</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $category)
            <tr scope="row">
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><a class="text-dark nav-link" href="/product/{{ $category->id }}"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>