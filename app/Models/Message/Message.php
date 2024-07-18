<?php

namespace App\Models\Message;

use App\Interfaces\Message\TextMessageInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model implements TextMessageInterface
{
    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';

    protected $fillable = [
        'text',
    ];

    public function videoMessage(): HasOne
    {
        return $this->hasOne(VideoMessage::class);
    }

    public function imageMessage(): HasOne
    {
        return $this->hasOne(ImageMessage::class);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
