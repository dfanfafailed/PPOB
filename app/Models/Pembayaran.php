<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';
    protected $guarded =['id_pembayaran'];
    protected $table = 'pembayaran';

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }

    public function admin()
    {
        return $this->hasMany(Admin::class, 'id_admin', 'id_admin');
    }

}
