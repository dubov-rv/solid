<?php

namespace App\Http\Requests\Backend\Product;

use App\Models\Product\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:2',
            'price' => 'required|numeric|min:0',
            'product_type' => 'required|in:' . Product::TYPE_PHYSICAL . ',' . Product::TYPE_DIGITAL,
            'weight' => 'required_if:type,' . Product::TYPE_PHYSICAL . '|numeric|min:0',
            'link' => 'required_if:type,' . Product::TYPE_DIGITAL . '|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('title'),
            'description' => __('description'),
            'price' => __('price'),
            'weight' => __('weight'),
            'link' => __('link'),
        ];
    }
}
