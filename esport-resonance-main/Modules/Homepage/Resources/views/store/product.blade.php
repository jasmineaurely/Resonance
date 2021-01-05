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

<!--PRODUCT SINGLE BEGIN-->

<section class="product-single">
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form action="{{ route('beli', $product->slug) }}" method="post"> @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="col-md-12"><h4>{{ $product->name }}</h4></div>
                <div class="col-md-7">
                    <div class="product-slider">
                        <div class="connected-carousels">
                            {{-- <div class="navigation jcarousel-skin-default">
                                <a href="#" class="prev prev-navigation"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                <a href="#" class="next next-navigation"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <div class="carousel carousel-navigation jcarousel-vertical">
                                    <ul>
                                        @foreach($product->product_images as $image)
                                        <li>
                                            <img src="{{ asset('storage/'. $image->image) }}" alt="product-thumb" class="img-fluid">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="stage ml-0">
                                <div class="carousel carousel-stage">

                                    <ul>
                                        @foreach($product->product_images as $image)
                                        <li class="stage-item">
                                            <span class="store-badge new">new</span>
                                            <img src="{{ asset('storage/'. $image->image) }}" alt="product-main-img">
                                        </li>
                                        @endforeach
                                    </ul>
                                    <a href="#" class="prev prev-stage"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a>
                                    <a href="#" class="next next-stage"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-right-info">
                        <div class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                        {!! $product->description !!}
                        <div class="title">
                            Colors
                            @error('warna[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="color-filter-item">
                            <ul>
                                <li>
                                    <label class="color-check green">
                                        <input type="checkbox" name="warna[]" value="green" />
                                        <span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="color-check black">
                                        <input type="checkbox" name="warna[]" value="black" />
                                        <span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="color-check purple">
                                        <input type="checkbox" name="warna[]" value="purple" />
                                        <span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="color-check gray">
                                        <input type="checkbox" name="warna[]" value="gray" />
                                        <span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="color-check red">
                                        <input type="checkbox" name="warna[]" value="red" />
                                        <span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="title">
                            Sizes
                            @error('ukuran[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="size-filter-item">
                            <ul>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="xs" />
                                        <span class="size">xs</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="s" />
                                        <span class="size">s</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="m" />
                                        <span class="size">m</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="l" />
                                        <span class="size">l</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="xl" />
                                        <span class="size">xl</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="xxl" />
                                        <span class="size">xxl</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="size-check">
                                        <input type="checkbox" name="ukuran[]" value="xxxl" />
                                        <span class="size">xxxl</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="title">Quantity</div>
                        <div class="quantity-wrap">
                            <input type="number" placeholder="1" name="qty" min="1" value="1">
                            <input type="submit" placeholder="1" value="Add to Cart" class="btn small">
                            {{-- <a href="cart.html" class="btn small">Add to cart</a> --}}
                        </div>
                        <div class="details">
                            <ul>
                                <li><span>SKU: </span>{{ $product->sku }}</li>
                                <li><span>Categories: </span>
                                    @foreach($product->categories as $category)
                                    {{ $category->name }},
                                    @endforeach
                                </li>
                                <li>
                                    <span>Tags: </span>
                                    @php
                                        $tags = explode(",", $product->tags);
                                    @endphp
                                    @foreach($tags as $tag)
                                    <a href="#">{{ $tag }},</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <ul class="socials">
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--STORE BANNER BEGIN-->

    <div class="store-banner position-relative">
        <div class="store-banner-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">official <span>apparel</span></div>
                        <a href="store.html" class="btn">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--STORE BANNER END-->

</section>

<!--PRODUCT SINGLE END-->

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
