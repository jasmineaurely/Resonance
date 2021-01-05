<?php

namespace Modules\News\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function news_category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
