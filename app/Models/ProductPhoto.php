<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductPhoto extends Model
{
     use HasFactory;
     protected $fillable = [
    'product_id',
    'imagpath',
];

public function product(){
    return $this->belongsTo(Product::class);
}


}
