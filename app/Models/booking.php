<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = ['bukti_bayar', 'no_invoice', 'tanggal', 'id_products', 'id_users', 'id_status', 'jumlah', 'tagihan'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'id_products', 'id');
    }
}
