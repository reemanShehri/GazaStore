@extends('admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Product</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price"
                           value="{{ old('price', $product->price) }}" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                           value="{{ old('quantity', $product->quantity) }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($product->img_path)
                        <div class="mt-2">
                            <img src="{{ $product->img_path }}" alt="Current Image"
                                 style="max-width: 100px; max-height: 100px;">
                            <p class="text-muted mt-1">Current Image</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                      rows="3">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
    // معاينة الصورة قبل الرفع
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.createElement('img');
        preview.src = URL.createObjectURL(e.target.files[0]);
        preview.style.maxWidth = '100px';
        preview.style.maxHeight = '100px';

        const container = document.querySelector('.mt-2');
        if (container) {
            container.innerHTML = '';
            container.appendChild(preview);
        } else {
            const newContainer = document.createElement('div');
            newContainer.className = 'mt-2';
            newContainer.appendChild(preview);
            document.getElementById('image').after(newContainer);
        }
    });
</script>
@endsection
