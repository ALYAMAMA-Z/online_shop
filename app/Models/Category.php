<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
protected $fillable = ['name', 'description', 'imagpath']; // أو الحقول اللي عندك في الجدول


    public function products(){
    return $this->hasMany(Product::class);
}

}
