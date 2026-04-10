<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorreviewRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
              'name'=>"required|max:10",
        'phone'=>"required",
        'email'=>"required|email",
        'subject'=>"required",
        'message'=>"required"
        ];
    }
}
