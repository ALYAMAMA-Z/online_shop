<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Orderdetails;

class Order extends Model
{
    use HasFactory;
     protected $fillable = [
       'name',
        'email',
        'Phone',
        'Address',
        'note',
        'payment_status',
         'payment_provider',
          'amount', 
         'order_number',
        
    ];
       public function Orderdetails(){
        return $this->hasMany(Orderdetails::class);
        }

}
