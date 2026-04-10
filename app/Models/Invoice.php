<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'order_id',
         'customer_name',
        'customer_email',
         'items', // JSON string
        'total',
        'title',
        'amount',
        'invoice_category_id',
        'invoice_date',
        'file_path',
        'user_id', 
        
    ];
    protected $casts = [
         'invoice_date' => 'date',
        'items' => 'array', // يسمح بتحويلها تلقائيًا إلى مصفوفة عند القراءة
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(InvoiceCategory::class, 'invoice_category_id');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
