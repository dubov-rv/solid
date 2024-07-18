<?php

namespace App\Interfaces\Message;

interface ImageMessageInterface
{
    public function getImageUrl(): string;
    public function setImageUrl(string $url): void;
}
