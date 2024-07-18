<?php

namespace App\Services\Message;

use App\Models\Message\ImageMessage;
use App\Models\Message\Message;
use App\Models\Message\VideoMessage;

class MessageSaveService
{
    public static function create($type, $data): Message
    {
        $message = Message::create($data);
        $messageId = $message->id;

        switch ($type) {
            case Message::TYPE_VIDEO:
                VideoMessage::create([
                    'message_id' => $messageId,
                    'video_url' => $data['video_url'],
                ]);
                break;

            case Message::TYPE_IMAGE:
                ImageMessage::create([
                    'message_id' => $messageId,
                    'image_url' => $data['image_url'],
                ]);
                break;
        }

        return $message;
    }

    public static function update(Message $message, $type, $data): Message
    {
        $message->update($data);
        $messageId = $message->id;

        switch ($type) {
            case Message::TYPE_VIDEO:
                if ($message->videoMessage()->exists()) {
                    $videoMessage = $message->videoMessage()->first();
                    $videoMessage->update(['video_url' => $data['video_url']]);
                } else {
                    VideoMessage::create([
                        'message_id' => $messageId,
                        'video_url' => $data['video_url'],
                    ]);
                }
                break;

            case Message::TYPE_IMAGE:
                if ($message->imageMessage()->exists()) {
                    $imageMessage = $message->imageMessage()->first();
                    $imageMessage->update(['image_url' => $data['image_url']]);
                } else {
                    ImageMessage::create([
                        'message_id' => $messageId,
                        'image_url' => $data['image_url'],
                    ]);
                }
                break;
        }

        return $message;
    }
}
