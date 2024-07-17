<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhysicalProduct extends Product
{
    protected $fillable = [
        'product_id',
        'weight',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
