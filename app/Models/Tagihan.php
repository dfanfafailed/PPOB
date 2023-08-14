<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';
    protected $primaryKey = 'id_tagihan';
    protected $guarded = ['id_tagihan'];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'id_penggunaan', 'id_penggunaan');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_tagihan','id_pembayaran');
    }
}
