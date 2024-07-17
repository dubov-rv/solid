<?php

namespace App\Interfaces\Notification;

interface NotificationInterface
{
    public function send($to, $message);
}
