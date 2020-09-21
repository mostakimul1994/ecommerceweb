<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Product as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Product extends Model
{
    use HasFactory;
    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    protected $fillable = [
        'category_id','vendor_id','name','brand','descriptions','unit_price','stock', 'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
