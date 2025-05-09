@extends('admin.master')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Create New Category</h1>

    <!-- Form to Create a New Category -->
    <div class="mb-4">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter category name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                          placeholder="Enter category description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" onchange="showImage(event)" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>

    {{-- @include('admin.categories._form')
   <button type="submit" class="btn btn-success">Create</button> --}}

</div>


@endsection


@section('js')

<script>
    function showImage(event) {
        const image = document.createElement('img');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.width = '100px';
        image.style.height = '100px';
        document.body.appendChild(image);
    }



@endsection




