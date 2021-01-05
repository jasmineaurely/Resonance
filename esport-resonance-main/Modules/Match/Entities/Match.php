<?php

namespace Modules\Match\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Team\Entities\Team;

class Match extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'match_date' => 'datetime',
        'match_time' => 'datetime',
    ];

    public function match_group()
    {
        return $this->belongsTo(MatchGroup::class);
    }

    public function match_round()
    {
        return $this->belongsTo(MatchRound::class);
    }

    public function match_status()
    {
        return $this->belongsTo(MatchStatus::class);
    }

    public function match_finish()
    {
        return $this->belongsTo(MatchFinish::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_1');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_2');
    }
}
