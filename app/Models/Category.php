<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Category as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'descriptions', 'status',
    ];
}
