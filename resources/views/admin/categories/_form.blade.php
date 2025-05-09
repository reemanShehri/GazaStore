<div class="mb-4">
    <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="image" class="form-label">Category image</label>
            <input type="text" image="image" id="image" class="form-control @error('image') is-invalid @enderror"
                   placeholder="Enter category image" value="{{ old('image', $category->img_path ?? '') }}" >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @php
                $url = '';
                if ($category->image){
                    $url = $category->img_path;
                }
            @endphp
            @if($category->img_path)

            <img width="80" id="preview" src="{{ $url }}" alt="">
            @endif

        </div>



        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter category name" value="{{ old('name', $category->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Category Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                      placeholder="Enter category description" rows="4" required>{{ old('description', $category->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>






        {{-- <div class="mb-3">

        <label>Image</label>
        <input type="file" onchange="showImg(event)" name="image" class="form-control @error('image') is-invalid @enderror" />
        @error('image')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
        @php
            $url = '';
            if ($category->image){
                $url = $category->img_path;
            }
        @endphp
        <img width="80" id="preview" src="{{ $url }}" alt="">

        </div> --}}



        {{-- <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Create' }}</button> --}}
    </form>
</div>

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
