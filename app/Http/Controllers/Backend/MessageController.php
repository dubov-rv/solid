<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Message\MessageStoreRequest;
use App\Models\Message\Message;
use App\Services\Message\MessageSaveService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('videoMessage', 'imageMessage')->latest()->paginate(30);

        dd($messages);
    }

    public function store(MessageStoreRequest $request)
    {
        $data = $request->validated();

        $message = MessageSaveService::create($data['type'], $data);

        dd($message);
    }

    public function update(Message $message, Request $request)
    {
        $data = $request->validated();

        $updatedMessage = MessageSaveService::update($message, $data['type'], $data);

        dd($updatedMessage);
    }

    public function destroy(Message $message)
    {
        $message->delete();

        dd('Message deleted successfully');
    }
}
