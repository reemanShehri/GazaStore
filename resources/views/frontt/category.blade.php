@extends('frontt.master')

@section('title', env('APP_NAME'))
@section('content')

<br>

<div class="container" style="margin-top: 100px;">
    <br>
<br>
    <h1>Category: {{ $category->name }}</h1>
    <p>Description: {{ $category->description }}</p>
    <img src="{{ $category->images && $category->images->path ? asset('images/'.$category->images->path) : asset('assets/images/default-category.jpg') }}" alt="{{ $category->name }}" style="width: 200px; height: 200px; object-fit: cover;">

    <br><br>

    <h2>Products in this Category</h2>
    <ul>
        @foreach($products as $product)
            <li style="margin-bottom: 30px;">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <img src="{{ $product->images ? asset('images/'.$product->images->path) : asset('assets/images/default-product.jpg') }}" alt="{{ $product->name }}" style="width: 200px; height: 200px; object-fit: cover;">
                <br>
                @include('frontt.parts.item', ['product' => $product])
            </li>
        @endforeach
        {{ $products->links() }}


        @forelse($category->products as $product)
            <li style="margin-bottom: 30px;">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <img src="{{ $product->images ? asset('images/'.$product->images->path) : asset('assets/images/default-product.jpg') }}" alt="{{ $product->name }}">

                <img src="{{ $product->images && $product->images->path ? asset('images/'.$product->images->path) : asset('assets/images/default-product.jpg') }}" alt="{{ $product->name }}" style="width: 200px; height: 200px; object-fit: cover;"> }}" style="width: 200px; height: 200px; object-fit: cover;"> --}}

                <br>

                @include('frontt.parts.item', ['product' => $product])
            </li>
        @empty
            <p>No products available in this category.</p>
        @endforelse
    </ul>
</div>
@endsection