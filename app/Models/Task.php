<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function scopeFilter($query, $request)
    {
        return $query
            ->when($request->has('title') && $request->title !== null, fn($query) => $query->where('title', 'LIKE', '%' . $request->title . '%'))
            ->when($request->has('description') && $request->description !== null, fn($query) => $query->where('description', 'LIKE', '%' . $request->description . '%'));
    }
}
