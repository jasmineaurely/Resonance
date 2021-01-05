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
                                <li>{{ $cat_title ?? "News"}}</li>
                            </ul>
                            <h1>{{ $news->title ?? "News"}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BREADCRUMBS END-->

    <!--CONTENT BEGIN-->

    <div class="content">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">

                <!--SIDEBAR BEGIN-->
                <section class="sidebar col-xs-6 col-md-3 sidebar-offcanvas" id="sidebar">
                    <div class="sidebar-menu-wrap">
                        <h6>Categories</h6>
                        <ul class="categories-list">
                            @foreach($cats as $cat)
                            <li>
                                <a href="{{ route('newscategory', $cat->slug) }}"><span class="count">{{ $cat->news()->count() }}</span>{{ $cat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-search-wrap">
                        <h6>Search</h6>
                        <form>
                            <div class="wrap">
                                <input type="text">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="recent-news">
                        <h6>recent news</h6>
                        @foreach($berita as $n)
                        <div class="item">
                            <div class="date"><a href="{{ route('newsread', $n->slug)}}">{{ $n->created_at->format('d M Y') }}</a> in <a href="{{ route('newscategory', $n->news_category->slug)}}">{{ $n->news_category->name }}</a></div>
                            <a href="{{ route('newsread', $n->slug)}}" class="name">{{ $n->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </section>
                <!--SIEDBAR END-->

                <!--NEWS SINGLE BEGIN-->

                <section class="news-single col-xs-12 col-sm-12 col-md-9">
                    <p class="hidden-md hidden-lg">
                        <button type="button" class="btn sidebar-btn" data-toggle="offcanvas" title="Toggle sidebar">sidebar</button>
                    </p>
                    <div class="item">
                        <div class="top-info">
                            <div class="date"><a href="{{ route('newsread', $news->slug)}}">25 Sep 2016</a> by <a href="{{ route('newsread', $news->slug)}}">{{ $news->user->name . ' ' . $news->user->last_name }}</a></div>
                        </div>
                        <div class="img-wrap">
                            <div class="bage highlight">{{ $news->news_category->name }}</div>
                            <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}">
                        </div>
                        <div class="post-text">
                            {!! $news->content !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tags">
                                        @php
                                            $tags = explode(",", $news->tags);
                                        @endphp

                                        @foreach($tags as $tag)
                                        <a href="{{ route('newsread', $news->slug)}}">{{ $tag }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="share-bar">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="author-box">
                            <div class="top">
                                <div class="avatar"><img src="images/common/author-avatar.jpg" alt="author-avatar"></div>
                                <div class="info">
                                    <div class="name">Mason Carrington</div>
                                    <p>Pour-over ethical wolf pork belly mustache tattooed poke fashion axe scenester.</p>
                                </div>

                            </div>
                            <div class="share-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="title">25 posts</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-right">
                                                    <ul class="share-socials">
                                                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </section>

                <!--NEWS SINGLE END-->

            </div>
        </div>
    </div>

    <!--CONTENT END-->
@endsection
