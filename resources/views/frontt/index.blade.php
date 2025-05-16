@extends('frontt.master')

@section('title', env('APP_NAME'))

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are RereShop</h4>
                                <span>Awesome, clean &amp; creative HTML5 Template</span>
                                <div class="main-border-button">
                                    <a href="{{ route('front.products') }}">Purchase Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>


                
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Women</h4>
                                            <span>Best Clothes For Women</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div> --}}
                            @foreach($categories as $category)
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>{{ $category->name }}</h4>
                                                <span>{{ $category->description }}</span>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>{{ $category->name }}</h4>
                                                    <p>{{ $category->details }}</p>
                                                    <div class="main-border-button">
                                                        {{-- <a href="{{ route('category.products', $category->id) }}">Discover More</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{ $category->images ? asset('images/'.$category->images->path) : asset('assets/images/default-category.jpg') }}" alt="{{ $category->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                                           
                                      
                                                                 </div>
                                    </div>
                                </div>
                            @endforeach


                            {{-- <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Best Clothes For Men</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Kids</h4>
                                            <span>Best Clothes For Kids</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Kids</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Accessories</h4>
                                            <span>Best Trend Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Accessories</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Products's Latest</h2>
                        <span>Details to details is what makes RereShop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach($products->take(3) as $product)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="{{ route('front.single_product', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="{{ $product->images ? asset('images/'.$product->images->path) : asset('assets/images/default-product.jpg') }}" alt="{{ $product->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $product->name }}</h4>
                                        <span>${{ $product->price }}</span>
                                        <ul class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <li><i class="fa {{ $i <= $product->rating ? 'fa-star' : 'fa-star-o' }}"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- Add other sections here -->

@endsection
