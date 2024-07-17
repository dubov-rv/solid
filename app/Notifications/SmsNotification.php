<?php

namespace App\Notifications;

use App\Interfaces\Notification\NotificationInterface;

class SmsNotification implements NotificationInterface
{
    public function send($to, $message)
    {
        echo "Sending SMS to $to: $message";
    }
}
