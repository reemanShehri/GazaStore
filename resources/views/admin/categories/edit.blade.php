@extends('admin.master')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Category</h1>

    <!-- Form to Edit a Category -->
    <div class="mb-4">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                          placeholder="Enter category description" rows="4" required>{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            {{-- <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if($category->img_path )
                    <div class="mt-2">
                             <img width="100" src="{{ $category->img_path }}" alt="" style="width: 50px; height: 50px;">
                    </div>
                @endif
            </div> --}}



            <div class="mb-3">
                <label for="image" class="form-label">Category image</label>
                <input type="file" image="image" id="image" class="form-control @error('image') is-invalid @enderror"
                       placeholder="Enter category image" value="{{ old('image', $category->img_path ?? '') }}" >
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @php
                    $url = '';
                    if ($category->images){
                        $url = $category->img_path;
                    }
                @endphp
                @if($category->img_path)

                <img width="80" id="preview" src="{{ asset('storage/'.$url) }}" alt="" onchange="showImage(event)">
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>


  {{-- @include('admin.categories._form')
    <button type="submit" class="btn btn-success">Update</button>  --}}


</div>

@endsection


@section('js')


<script>
    function showImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview') || document.createElement('img');

        if (!preview.id) {
            preview.id = 'imagePreview';
            preview.style.width = '50px';
            preview.style.height = '50px';
            preview.style.marginBottom = '10px';
            input.parentNode.insertBefore(preview, input.nextSibling);
        }

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
