<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    
    protected $table = 'HopaCart';

use HasFactory;
   /* 
    protected $fillable = [
        'cart_name',
        'cart_number',
        'cvc',
        'expiration_date','amount'
    ];
    * 
    */
    
     
}
