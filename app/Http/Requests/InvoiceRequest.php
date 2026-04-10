<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
             'title' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'invoice_category_id' => 'required|exists:invoice_categories,id',
            'invoice_date' => 'nullable|date',
            'file' => 'required|mimes:pdf|max:2048',
        ];
    }
}
