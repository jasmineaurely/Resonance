<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Store\Entities\ProductCheckout;

class ProductPay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_checkout()
    {
        return $this->belongsTo(ProductCheckout::class);
    }
}
