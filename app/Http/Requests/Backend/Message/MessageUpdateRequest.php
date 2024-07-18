<?php

namespace App\Http\Requests\Backend\Message;

use App\Models\Message\Message;
use Illuminate\Foundation\Http\FormRequest;

class MessageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|min:2',
            'type' => 'required|in:' . Message::TYPE_TEXT . ',' . Message::TYPE_IMAGE . ',' . Message::TYPE_VIDEO,
            'video_url' => 'required_if:type,' . Message::TYPE_VIDEO . '|string',
            'image_url' => 'required_if:type,' . Message::TYPE_IMAGE . '|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'text' => __('text'),
            'video_url' => __('video_url'),
            'image_url' => __('image_url'),
        ];
    }
}
