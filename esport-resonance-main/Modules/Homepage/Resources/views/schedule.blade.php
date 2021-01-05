@extends('homepage::layout')

@section('content')
<div class="broadcast-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Upcoming matches</h4>
            </div>
            <div class="col-md-12">
                <div class="broadcast-list" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($data as $latest)
                    <div class="broadcast-item">
                        <div class="item-header" id="headingOne">
                            <div class="row">
                                <div class="col-md-1 col-sm-2">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->iteration }}" class="arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-7 col-sm-10">
                                    <div class="item-head-body">
                                        <a href="matches.html"><img src="{{ asset('storage/'.$latest->team1->image) }}" width="40" height="40" alt="team-logo1"></a>
                                        <span class="vs">vs</span>
                                        <a href="matches.html"><img src="{{ asset('storage/'.$latest->team2->image) }}" width="40" height="40" alt="team-logo1"></a>
                                        <span class="info">
                                            <span class="what">{{ $latest->match_group->name }} - {{ $latest->match_round->name }}</span>
                                            <span class="then">{{ $latest->match_date->format('d F Y') }} / {{ $latest->match_time->format('H:i A') }}</span>
                                        </span>
                                        <span class="marker">live</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="channel">
                                        <img src="{{ asset('templates') }}/images/common/channel-logo.png" width="40" height="40" alt="channel-logo">
                                        <span class="info">
                                            <span class="what">{{ $latest->match_group->name }} - {{ $latest->match_round->name }}</span>
                                            <span class="then">{{ $latest->match_date->format('d F Y') }} / {{ $latest->match_time->format('H:i A') }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $loop->iteration }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="img-wrap"><img src="{{ asset('storage/'.$latest->image) }}" alt="broad-img"></div>
                            <div class="item-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="title">Match details</div>
                                        {!! $latest->match_details !!}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="title">Match Time</div>
                                        <p>{{ $latest->match_time->format('H:i A') }}, {{ $latest->match_date->format('l') }}<br>{{ $latest->match_date->format('d F Y') }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="title">Stadium</div>
                                        <p>{{ $latest->stadium }}, <br>{{ $latest->match_location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!--BROADCAST SPONSORS BEGIN-->
    <div class="broadcast-sponsors">
        <div class="list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 text-center">
                        <img class="image-width" src="{{ asset('templates') }}/images/common/pepsi.png" alt="sponsor-img" width="150px">
                    </div>
                    <div class="col-sm-3 col-xs-6 text-center">
                        <img  class="image-width" src="{{ asset('templates') }}/images/common/sm-logo.png" alt="sponsor-img" width="150px">
                    </div>
                    <div class="col-sm-3 col-xs-6 text-center">
                        <img class="image-width" src="{{ asset('templates') }}/images/common/mastercard.png" alt="sponsor-img" width="150px">
                    </div>
                    <div class="col-sm-3 col-xs-6 text-center">
                        <img class="image-width" src="{{ asset('templates') }}/images/common/twitch.png" alt="sponsor-img" width="150px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BROADCAST SPONSORS END-->

</div>
@endsection
