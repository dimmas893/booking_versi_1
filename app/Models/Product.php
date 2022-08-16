<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'stock',
        'harga',
        'id_categories',
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'id_categories', 'id');
    }
}
