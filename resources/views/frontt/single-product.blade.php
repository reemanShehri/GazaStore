@extends('frontt.master')

@section('title', env('APP_NAME'))
@section('content')
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->

 

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">

                            <img src="{{ asset('images/' . $productImages->path) }}" alt="">
                   
                        {{-- <img src="{{ asset('images/' . $product->image1) }}" alt="">
                        <img src="{{ asset('images/' . $product->image2) }}" alt="">
                   --}}
                </div> 
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $product->name }}</h4>
                        <span class="price">${{ $product->price }}</span>
                        <ul class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <li><i class="fa fa-star{{ $i <= $product->rating ? '' : '-o' }}"></i></li>
                            @endfor
                        </ul>
                        <span>{{ $product->description }}</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>{{ $product->quote }}</p>
                        </div>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>No. of Orders</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: ${{ $product->price }}</h4>
                            <div class="main-border-button"><a href="">Add To Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    
 @endsection