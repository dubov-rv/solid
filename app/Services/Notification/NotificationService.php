<?php

namespace App\Services\Notification;

use App\Interfaces\Notification\NotificationInterface;

class NotificationService
{
    protected $notification;

    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    public function sendNotification($to, $message)
    {
        $this->notification->send($to, $message);
    }
}
