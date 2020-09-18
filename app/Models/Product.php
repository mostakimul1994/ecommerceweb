<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Product as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','vendor_id','name','brand','descriptions','unit_price','stock', 'status',
    ];
}
