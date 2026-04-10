<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\ProductPhoto;




class Product extends Model
{
         use HasFactory;

         protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'category_id',
        'imagpath'
    ];
        
        public function Category(){
        return $this->belongsTo(Category::class,'category_id');
        }

        public function ProductPhoto(){
        return $this->hasMany(ProductPhoto::class);
        }



}
