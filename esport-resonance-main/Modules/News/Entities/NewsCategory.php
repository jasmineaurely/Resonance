<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
