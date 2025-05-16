@extends('frontt.master')

@section('title', env('APP_NAME'))
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{ route('front.single_product', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#" class="add-to-cart" data-product-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="{{ $product->images ? asset('images/'.$product->images->path) : asset('assets/images/default-product.jpg') }}" alt="{{ $product->name }}">
                        </div>
                        <div class="down-content">
                            <h4>{{ $product->name }}</h4>
                            <span>${{ number_format($product->price, 2) }}</span>
                            <ul class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <li><i class="fa fa-star{{ $i <= $product->rating ? '' : '-o' }}"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            {{-- <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        @if($products->currentPage() > 1)
                            <li><a href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
                        @endif
                        
                        @for($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="{{ $products->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        
                        @if($products->hasMorePages())
                            <li><a href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
                        @endif
                    </ul>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
@endsection