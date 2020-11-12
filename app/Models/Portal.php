<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'type',
    ];
    public function categories(){
        return $this->hasMany(Category::class);
    }

}
