<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ✅ These are the fields you want to allow
    protected $fillable = [
        'name',
        'sku',
        'price',
        'status',
        'image',
    ];
}
