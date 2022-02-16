<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

      protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'name_id',
        'title',
        'content',
        'created_at'
    ];
}
