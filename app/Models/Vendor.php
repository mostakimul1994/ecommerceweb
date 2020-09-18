<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Vendor as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory;
     protected $fillable = [
        'name', 'email','address' ,'status',
    ];


}
