<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    const TYPE_PHYSICAL = 'physical';
    const TYPE_DIGITAL = 'digital';

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function physicalProduct(): HasOne
    {
        return $this->hasOne(PhysicalProduct::class);
    }

    public function digitalProduct(): HasOne
    {
        return $this->hasOne(DigitalProduct::class);
    }
}
