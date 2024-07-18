<?php

namespace App\Models\Message;

use App\Interfaces\Message\VideoMessageInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoMessage extends Message implements VideoMessageInterface
{
    protected $fillable = [
        'message_id',
        'video_url'
    ];

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }

    public function getVideoUrl(): string
    {
        return $this->video_url;
    }

    public function setVideoUrl(string $url): void
    {
        $this->video_url = $url;
    }
}
