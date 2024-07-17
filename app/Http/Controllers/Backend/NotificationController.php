<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Notification\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function sendNotification(Request $request)
    {
        /*$to = $request->input('to');
        $message = $request->input('message');*/
        $to = 'Receiver';
        $message = 'Some message';

        $this->notificationService->sendNotification($to, $message);
    }
}
