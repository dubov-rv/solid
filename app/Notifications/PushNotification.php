<?php

namespace App\Notifications;

use App\Interfaces\Notification\NotificationInterface;

class PushNotification implements NotificationInterface
{
    public function send($to, $message)
    {
        echo "Sending push-notification to $to: $message";
    }
}
