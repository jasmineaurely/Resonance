@extends('homepage::layout')

@section('content')
<!--BROADCASTS BEGIN-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>broadcasts</h3>

            <div class="mathc-live-broadcasts">
                <div class="background">
                    <div class="broadcast-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">

                            @foreach($data as $d)
                            @if($loop->first)
                            <li class="active" role="presentation">
                            @else
                            <li>
                            @endif
                                <a href="#title{{ $loop->iteration }}" role="tab" data-toggle="tab"><img src="{{ asset('storage/'.$d->image) }}" alt="{{ $d->title }}">
                                    <span class="info">
                                        <span class="title">{{ $d->title }}</span>
                                        <span class="language">{{ $d->language }}</span>
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content">
                        @foreach($data as $d)
                        <div class="tab-pane fade @if($loop->first) in active @endif " role="tabpanel" id="title{{ $loop->iteration }}">
                            {{-- <iframe width="560" height="315" src="{{ $d->youtube }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                            <iframe width="1100" height="500" src="https://www.youtube.com/embed/{{ $d->youtube }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            {{-- <iframe width="1100" height="700" src="{{ $d->youtube }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--BROADCASTS END-->
@endsection
