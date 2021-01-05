<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? "RESONANCE" }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7COpen+Sans:700,400%7CRaleway:400,800,900" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('templates') }}/css/library/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('templates') }}/dev-assets/preloader-default.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('templates') }}/dev-assets/demo-switcher.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('templates') }}/css-min/soccer.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('templates') }}/fontawesome-free/css/all.min.css"> --}}
</head>

<body>

    <!--MAIN MENU WRAP BEGIN-->
    <div class="main-menu-wrap sticky-menu">
        <div class="container">
            <a href="index.html" class="custom-logo-link"><img src="{{ asset('templates') }}/images/logo.png" alt="logo" class="custom-logo" style="width:50px;height:50px;"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#team-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <nav class="navbar">
                <div class="collapse navbar-collapse" id="team-menu">
                    <ul class="main-menu nav">
                        <li class="active">
                            <a href="{{ route('home') }}"><span>Home</span></a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}"><span>Matches</span></a>
                            <ul>
                                <li><a href="{{ route('live') }}"><span>match live</span></a></li>
                                <li><a href="{{ route('schedule') }}"><span>schedule</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"><span>Registration</span></a>
                        </li>
                        <li><a href="{{ route('news') }}"><span>News</span></a></li>
                        <li><a href="{{ route('belanja') }}"><span>Store</span></a></li>
                        <li><a href="{{ route('cart') }}"><span>Cart</span></a></li>
                        <li class="cart full">
                            <a href="{{ route('login') }}">
                                <span><img src="{{ asset('templates') }}/images/user.png" width="20px"></img></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--MAIN MENU WRAP END-->


    <!-- DYNAMIC CONTENT -->
    @yield('content')
    <!-- DYNAMIC CONTENT END -->

    <!--FOOTER BEGIN-->
    <footer class="footer">
        <div class="wrapper-overfllow">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-left">
                            <div class="wrap">
                                <a href="index-2.html" class="foot-logo"><img src="{{ asset('templates') }}/images/soccer/footer-logo.png" alt="footer-logo"></a>
                                <p></p>
                                <ul class="foot-left-menu">
                                    <li><a href="#">First team</a></li>
                                    <li><a href="#">Second team</a></li>
                                    <li><a href="#">Amateurs</a></li>
                                    <li><a href="#">Donation</a></li>
                                    <li><a href="#">trophies</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-offset-1">
                        <div class="foot-news">
                            <h4>Recent news</h4>
                            <div class="item">
                                <a href="/news/{{ $new->slug }}" class="image"><img class="img-responsive" src="{{ asset('storage/'.$new->image) }}" alt="news-image"></a>
                                <a href="/news/{{ $new->slug }}" class="name">{{ $new->title }}</a>
                                <a href="/news/{{ $new->slug }}" class="date">01 DES 2020</a>
                                <span class="separator">in</span>
                                <a href="/news/{{ $new->slug }}" class="category">{{ $new->news_category->name }}</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-12">
                        <div class="foot-contact">
                            <h4>Contact us</h4>
                            <ul class="contact-list">
                                <li><i class="fa fa-flag" aria-hidden="true"></i><span>Jakarta, Indonesia</span></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:team@email.com">resonance@email.com</a></li>
                                <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><span>+62 00000000</span></li>
                            </ul>
                            <ul class="socials">
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--FOOTER END-->

    <script type="text/javascript" src="{{ asset('templates') }}/js/library/jquery.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/bootstrap.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/jquery.sticky.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/jquery.jcarousel.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/jcarousel.connected-carousels.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/progressbar.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/jquery.bracket.min.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/chartist.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/Chart.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/fancySelect.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/isotope.pkgd.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/imagesloaded.pkgd.js"></script>

<script type="text/javascript" src="{{ asset('templates') }}/js/jquery.team-coundown.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/matches-slider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/header.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/matches_broadcast_listing.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/news-line.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/match_galery.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/main-club-gallery.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/product-slider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/circle-bar.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/standings.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/shop-price-filter.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/timeseries.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/radar.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/slider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/preloader.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/diagram.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/bi-polar-diagram.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/label-placement-diagram.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/donut-chart.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/animate-donut.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/advanced-smil.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/svg-path.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/pick-circle.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/horizontal-bar.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/gauge-chart.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/stacked-bar.js"></script>

<script type="text/javascript" src="{{ asset('templates') }}/js/library/chartist-plugin-legend.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/chartist-plugin-threshold.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/library/chartist-plugin-pointlabels.js"></script>

<script type="text/javascript" src="{{ asset('templates') }}/js/treshold.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/visible.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/anchor.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/landing_carousel.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/landing_sport_standings.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/twitterslider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/champions.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/landing_mainnews_slider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/carousel.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/video_slider.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/footer_slides.js"></script>
<script type="text/javascript" src="{{ asset('templates') }}/js/player_test.js"></script>

<script type="text/javascript" src="{{ asset('templates') }}/js/main.js"></script>

{{-- <script type="text/javascript" src="{{ asset('templates') }}/dev-assets/demo-switcher.js"></script> --}}
</body>


</html>
