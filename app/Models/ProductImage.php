<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ProductImage as Authenticatable;
use Illuminate\Notifications\Notifiable;
class ProductImage extends Model
{
    use HasFactory;
      protected $fillable = [
        'product_id', 'image',
    ];

}
