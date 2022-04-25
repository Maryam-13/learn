<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'title',
        'author',
        'image',
        'annotation',
        'created_at',
        'whom',
    ];
    use HasFactory;
}
