@extends('layouts/main')

@section('promo')
    <section id="promo">
        <div id="promo-details">
            <h1>Today's Deals</h1>
            <p>Checkout this section of <br />
            products at a discounted price.</p>
            <a href="#" class="default-btn">Shop Now</a>
        </div><!-- end promo-details -->
        {{ HTML::image('img/promo.png', 'Promotional Ad') }}
    </section><!-- promo -->

@stop

@section('content')

    <h2>Featured</h2>
    <hr>
    <div id="products">
        @foreach($products as $product)
        <div class="product">
            <a href="/store/view/{{ $product->$id }}">
                <img src="img/product.gif" alt="Product" class="feature"> {{ HTML::image($product->image, $product->title, array('class'=> 'feature', 'width'=> 245, 'height'=> 120)) }}
            </a>

            <h3><a href="/store/view/{{ $product->$id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>

            <h5>Availability: <span class="instock">In Stock</span></h5> <!-- will need to finish the availablity view -->

            <p>
                <a href="#" class="cart-btn">
                    <span class="price">$499.08</span>
                    <img src="img/white-cart.gif" alt="Add to Cart">
                    ADD TO CART
                </a>
            </p>
        </div>
    </div><!-- end products -->
@stop