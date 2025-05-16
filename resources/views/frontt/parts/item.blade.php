@extends('frontt.master')

@section('title', env('APP_NAME'))
@section('content')

    <div class="container">
        <h1>Category: {{ $category->name }}</h1>
        <p>Description: {{ $category->description }}</p>
      
    
        <h2>Products in this Category</h2>
        <ul>
            @forelse($category->products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                </li>
            @empty
                <p>No products available in this category.</p>
            @endforelse
        </ul>
    </div>


    @endsection