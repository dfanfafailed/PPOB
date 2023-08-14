<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_pelanggan';
    protected $table = 'pelanggan';
    protected $guarded = ['id_pelanggan'];

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    }

    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'id_pelanggan', 'id_penggunaan');
    }

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_pelanggan', 'id_tagihan');
    }
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pelanggan', 'id_pembayaran');
    }
}
