<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'email', 'phone', 'user_id' 'rec_name', 'rec_email', 'rec_phone', 'rec_address_1', 'rec_address_2', 'message','status',
    ];

}
