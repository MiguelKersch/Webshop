@include('layouts.head')
@include('layouts.navbar')

<h1>Category`s</h1>
<table class="table table-striped">
    <thead class="bg-dark text-light">
        <tr scope="row">
            <td scope="col">Id</td>
            <td scope="col">Name</td>
            <td scope="col">Description</td>
        </tr>
    </thead>
    <tbody>
    @foreach($categorys as $category)
    <tr scope="row">
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <button><a class="text-light nav-link" href="{{ url('/category/product?'. $category->id) }}">Category</a></button>
    </tr>
    @endforeach
    </tbody>
</table>