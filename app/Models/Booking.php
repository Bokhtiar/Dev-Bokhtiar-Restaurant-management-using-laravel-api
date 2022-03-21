<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id', 'name', 'email', 'phone', 'date', 'time', 'people','description','status'
    ]

}
