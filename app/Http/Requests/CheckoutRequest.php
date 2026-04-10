<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'Phone' => 'required|string',
        'Address' => 'required|string',
        'note' => 'nullable|string',
        'amount' => 'required|numeric|min:0.01',
        'payment' => 'required|string',
        ];
    }
}
