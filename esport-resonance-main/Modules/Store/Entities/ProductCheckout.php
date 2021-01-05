<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCheckout extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_buy()
    {
        return $this->belongsTo(ProductBuy::class, 'kode', 'kode');
    }
}
