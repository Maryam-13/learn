<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'name_id',
        'title',
        'content',
        'date'
    ];
}
