<?php

namespace App\Notifications;

use App\Interfaces\Notification\NotificationInterface;

class EmailNotification implements NotificationInterface
{
    public function send($to, $message)
    {
        echo "Sending email to $to: $message";
    }
}
