<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Cart extends Model
{  
    use HasFactory;
    protected $table='carts';
    protected $primaryKey='cart_id';

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'status',
    ];
    protected $with = ['product'];
    public function product()
    {
      return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }





}
