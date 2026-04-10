<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorimageRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
        ];
    }
}
