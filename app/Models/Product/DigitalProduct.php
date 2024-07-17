<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DigitalProduct extends Product
{
    protected $fillable = [
        'product_id',
        'link',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
