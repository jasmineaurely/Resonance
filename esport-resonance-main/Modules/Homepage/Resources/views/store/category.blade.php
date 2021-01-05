@extends('homepage::layout')

@section('content')
<!--BREADCRUMBS BEGIN-->
<section class="image-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <div class="wrap">
                        <ul class="breadcrumbs">
                            <li><a href="{{ route('home')}}">Main</a>/</li>
                            <li>Store</li>
                        </ul>
                        <h1>{{ $title ?? "Resonance Store" }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--BREADCRUMBS END-->

<!--STORE WRAP BEGIN-->

<div class="store-wrap">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="sidebar col-xs-6 col-sm-6 col-md-3 sidebar-offcanvas" id="sidebar">
                <div class="sidebar-menu-wrap">
                    <h6>Categories</h6>
                    <ul class="categories-list">
                        <li>
                            <a href="{{ route('belanja') }}"><span class="count">&nbsp;</span>All</a>
                        </li>
                        @foreach($cats as $cat)
                        <li>
                            <a href="{{ route('belanja_category', $cat->slug)}}"><span class="count">&nbsp;</span>{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9">
                <p class="hidden-md hidden-lg">
                    <button type="button" class="btn sidebar-btn" data-toggle="offcanvas" title="Toggle sidebar">sidebar</button>
                </p>
                <h6>All Products</h6>
                <div class="row mb-3">
                    @forelse($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="store-list-item">
                            <div>
                                <a href="{{ route('belanja_product', $product->product->slug) }}">
                                    <img src="{{ asset('storage/'. $product->product->thumbnail) }}" alt="product">
                                </a>
                                <div class="info">
                                    <span class="name">{{ $product->product->name }}</span>
                                    <span class="price">Rp{{ number_format($product->product->price, 0, ',', '.') }}</span>
                                    <div class="btn-wrap">
                                        <button class="btn small">add to cart</button>
                                        <button class="btn small">Details</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col">
                        No product
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="store-banner position-relative">
    <div class="store-banner-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">official <span>apparel</span></div>
                    <a href="{{ route('belanja') }}" class="btn">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--MAIN SPONSOR SLIDER BEGIN-->
<div class="main-sponsor-slider-background">
<div id="main-sponsor-slider" class="carousel slide main-sponsor-slider" data-ride="carousel">
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <img class="sponsor-icons" src="{{ asset('templates') }}/images/common/pepsi.png" alt="sponsor-image">
                </div>
                <div class="col-xs-4 text-center">
                    <img class="sponsor-icons" src="{{ asset('templates') }}/images/common/sm-logo.png" alt="sponsor-image">
                </div>
                <div class="col-xs-4 text-center">
                    <img  class="sponsor-icons dota-csgo-image" src="{{ asset('templates') }}/images/common/mastercard.png" alt="sponsor-image">
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <img class="sponsor-icons" src="{{ asset('templates') }}/images/common/pepsi.png" alt="sponsor-image">
                </div>
                <div class="col-xs-4 text-center">
                    <img  class="sponsor-icons" src="{{ asset('templates') }}/images/common/sm-logo.png" alt="sponsor-image">
                </div>
                <div class="col-xs-4 text-center">
                    <img class="sponsor-icons dota-csgo-image" src="{{ asset('templates') }}/images/common/mastercard.png" alt="sponsor-image">
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="nav-arrow left-arrow" href="#main-sponsor-slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
    </a>
    <a class="nav-arrow right-arrow" href="#main-sponsor-slider" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
<!--MAIN SPONSOR SLIDER END-->

</div>

<!--STORE WRAP END-->
@endsection
