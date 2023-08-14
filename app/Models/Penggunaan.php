<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = 'penggunaan';
    protected $guarded = ['id_penggunaan'];
    protected $primaryKey= 'id_penggunaan';

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_penggunaan', 'id_penggunaan');
    }
}
