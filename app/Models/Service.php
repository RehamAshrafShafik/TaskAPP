<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
         'title',
        'user_id',
        'category_id',
        'subcategory_id',
        'price',
        'negotiationl',
        'description',
        'place',
        'phone',
         'email',
        'approval',
        'status'
    ];
}
