<?php

namespace App\Interfaces\Message;

interface TextMessageInterface
{
    public function getText(): string;
    public function setText(string $text): void;
}
