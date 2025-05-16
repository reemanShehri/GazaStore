@extends('admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">All Products</h1>

    @if(session()->has('msg'))
    <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show" role="alert" 
         data-bs-delay="3000" data-bs-autohide="true">
        {{ session()->get('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                }, 3000);
            }
        });
    </script>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    {{-- <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td> --}}

                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{-- @if($category->image) --}}
                        {{-- {{ asset('images/' . $category->image->path) }} --}}
                            <img width="100" src="{{ $product->img_path }}" alt="" style="width: 50px; height: 50px;">
                        {{-- @else
                            <span>No Image</span>
                        @endif --}}
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
</div>
@endsection
