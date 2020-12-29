<?php

namespace Modules\Match\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match extends Model
{
    use HasFactory;

    protected $guarded = [];

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
}
