<?php

namespace App\Models\Message;

use App\Interfaces\Message\ImageMessageInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageMessage extends Message implements ImageMessageInterface
{
    protected $fillable = [
        'message_id',
        'image_url'
    ];

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $url): void
    {
        $this->image_url = $url;
    }
}
