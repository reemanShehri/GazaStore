@extends('admin.master')

@section('content')


<div class="container">
    <h1>All Categories</h1>
    <table class="table table-bordered">
        <thead>
            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Categories</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container mt-5">

                    @if(session()->has('msg'))
                    <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show" role="alert">
                        {{ session()->get('msg') }}
                        <script>
                            setTimeout(() => {
                                document.querySelector('.alert').remove();
                            }, 3000);
                        </script>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table table-bordered table-hover">
                                <tr class="table-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Counts</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{-- @if($category->image) --}}
                                        {{-- {{ asset('images/' . $category->image->path) }} --}}
                                            <img width="100" src="{{ $category->img_path }}" alt="" style="width: 50px; height: 50px;">
                                        {{-- @else
                                            <span>No Image</span>
                                        @endif --}}
                                    </td>

                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->products->count() }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are u sure')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No categories found</td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>

                    </div>

                    {{ $categories->links() }}

                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>
        </thead>
        <tbody>
            {{-- @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
