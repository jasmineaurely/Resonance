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
                                <li>Category</li>
                            </ul>
                            <h1>{{ $cat_title ?? "News"}}</h1>
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
                </section>
                <!--SIEDBAR END-->

                <!--NEWS LIST BEGIN-->
                <div class="news-list col-xs-12 col-md-9">
                    <p class="hidden-md hidden-lg">
                        <button type="button" class="btn sidebar-btn" data-toggle="offcanvas" title="Toggle sidebar">sidebar</button>
                    </p>

                    @foreach($news as $n)
                        @if($loop->first)
                            <div class="item img-top">
                                <div class="img-wrap">
                                    <div class="bage"><a href="{{ route('newsread', $n->slug)}}">{{ $n->news_category->name }}</a></div>
                                    <a href="{{ route('newsread', $n->slug)}}"><img src="{{ asset('storage/'.$n->image) }}" alt="{{ $n->title }}"></a>
                                </div>
                                <div class="info">
                                    <a href="{{ route('newsread', $n->slug)}}" class="name">{{ $n->title }}</a>
                                    <div class="wrap">
                                        <a href="{{ route('newsread', $n->slug)}}">{{ $n->created_at->format('d M Y') }}</a> by <a href="{{ route('newsread', $n->slug)}}">{{ $n->user->name . ' ' . $n->user->last_name }}</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        @else
                            <div class="item">
                                <div class="info">
                                    <a href="{{ route('newsread', $n->slug)}}" class="name">{{ $n->title }}</a>
                                    <div class="wrap">
                                        <a href="{{ route('newsread', $n->slug)}}">{{ $n->created_at->format('d M Y') }}</a> by <a href="{{ route('newsread', $n->slug)}}">{{ $n->user->name . ' ' . $n->user->last_name }}</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="img-wrap">
                                    <a href="{{ route('newsread', $n->slug)}}"><img src="{{ asset('storage/'.$n->image) }}" alt="{{ $n->title }}"></a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- <div class="pagination-wrap">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
                <!--NEWS LIST END-->

            </div>
        </div>
    </div>

    <!--CONTENT END-->
@endsection
