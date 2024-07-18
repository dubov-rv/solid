<?php

namespace App\Interfaces\Message;

interface VideoMessageInterface
{
    public function getVideoUrl(): string;
    public function setVideoUrl(string $url): void;
}
