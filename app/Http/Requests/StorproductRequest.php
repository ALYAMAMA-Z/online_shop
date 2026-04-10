<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorproductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'name' => 'required|max:10',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
