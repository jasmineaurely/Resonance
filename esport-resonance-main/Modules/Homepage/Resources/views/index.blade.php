@extends('homepage::layout')

@section('content')

    <div class="main-slider-section">
        <div class="main-slider">
            <div id="main-slider" class="carousel slide" data-ride="carousel" data-interval="4000">
                <div class="carousel-inner" role="listbox">

                    @foreach($slides as $latest)
                    <div class="item @if($loop->first) active @endif">
                        <div class="main-slider-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="match-date">{{ $latest->match_date->format('d F Y') }} / {{ $latest->match_time->format('H:i A') }} / {{ $latest->match_location }}</div>
                                        <div class="team"> {{ $latest->team1->name }}
                                            <div class="big-count">
                                                {{ $latest->score_team_1 }}:{{ $latest->score_team_2 }}
                                            </div>
                                            {{ $latest->team2->name }}
                                        </div>
                                        {{-- <div class="booking">
                                            <a href="matches-list.html">
                                                Lihat Jadwal
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Controls -->
                <a class="nav-arrow left-arrow" href="#main-slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only"></span>
                </a>
                <a class="nav-arrow right-arrow" href="#main-slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only"></span>
                </a>

                <div class="event-nav">
                    <div class="container">
                        <div class="row no-gutter carousel-indicators">

                            @foreach($slides as $i => $latest)
                            <div class="col-sm-4 @if($loop->first) active @endif" data-slide-to="{{ $i }}" data-target="#main-slider">
                                <a href="#" class="nav-item">
                                    <span class="championship">{{ $latest->match_group->name }} - {{ $latest->match_round->name }}</span>
                                    <span class="teams-wrap">
                                        <span class="team"><img src="{{ asset('storage/'.$latest->team1->image) }}" alt="{{ $latest->team1->name }}"></span>
                                        <span class="score">
                                            <span>{{ $latest->score_team_1 }}:{{ $latest->score_team_2 }}</span>
                                        </span>

                                        <span class="team1">
                                            <span><img src="{{ asset('storage/'.$latest->team2->image) }}" alt="{{ $latest->team2->name }}"></span>
                                        </span>
                                    </span>
                                    @if($latest->match_finish_id == 3)
                                    <span class="game-result">({{ $latest->score_additional_team_1 }}-{{ $latest->score_additional_team_2 }}) {{ $latest->match_finish->name }}</span>
                                    @endif
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--MAIN MACTH SHEDULE BEGIN-->

    <section class="main-match-shedule">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h6>Next match</h6>
                    @foreach($nexts as $next)
                    <div class="main-next-match bg-cover">
                        <img src="{{ asset('templates') }}/images/soccer/next-match-bg.jpg" class="next-match-background-img" alt="next-image">
                        <div class="wrap">
                            <div class="place" >{{ $next->match_location }}</div>
                            <div class="date" >{{ $next->match_date->format('d F Y') }} / {{ $next->match_time->format('H:i A') }}</div>
                            <div class="teams-wrap" >
                                    <a href="#" class="team">
                                        <span>{{ $next->team1->name }}</span>
                                        <span><img src="{{ asset('storage/'.$next->team1->image) }}" alt="{{ $next->team1->name }}"></span>
                                    </a>
                                    <div class="vs">
                                    vs
                                    </div>
                                    <a href="#" class="team1">
                                        <span><img src="{{ asset('storage/'.$next->team2->image) }}" alt="{{ $next->team2->name }}""></span>
                                        <span>{{ $next->team2->name }}</span>
                                    </a>
                            </div>
                            <a href="#" class="booking">UPCOMING MATCH</a>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h6>Latest matches</h6>

                    <div class="main-lates-matches">
                        @foreach($latests as $latest)
                        <a href="#" class="item">
                            <span class="championship">{{ $latest->match_group->name }} - {{ $latest->match_round->name }}</span>
                            <span class="teams-wrap">
                                    <span class="team">
                                        <span>
                                            <img src="{{ asset('storage/'.$latest->team1->image) }}" alt="{{ $latest->team1->name }}">
                                        </span>
                                        <span>{{ $latest->team1->name }}</span>
                                    </span>
                                    <span class="score">
                                        <span>{{ $latest->score_team_1 }}:{{ $latest->score_team_2 }}</span>

                                    </span>
                                    <span class="team1">
                                        <span>{{ $latest->team2->name }}</span>
                                        <span><img src="{{ asset('storage/'.$latest->team2->image) }}" alt="{{ $latest->team2->name }}"></span>
                                    </span>
                            </span>
                            @if($latest->match_finish_id == 3)
                            <span class="game-result">({{ $latest->score_additional_team_1 }}-{{ $latest->score_additional_team_2 }}) {{ $latest->match_finish->name }}</span>
                            @endif
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--MAIN MACTH SHEDULE END-->

    <!--MAIN PLAYERS STAT END-->


    <!--AWARD BOX END-->

    <!--CALL TO ACTION BEGIN-->
    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-9 col-xs-6">
                    <div class="text">Become part of a great team</div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 text-right">
                    <a href="{{ route('register') }}" class="join">Join us</a>
                </div>
            </div>
        </div>
    </div>
    <!--CALL TO ACTION END-->
@endsection

