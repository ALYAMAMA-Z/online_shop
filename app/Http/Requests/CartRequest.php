<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
             'name' => 'required|max:50',
            'email' => 'required|email',
            'Phone' => 'required|max:20',
            'Address' => 'required|max:100',
            'note' => 'nullable|max:255',
        ];
    }
}
