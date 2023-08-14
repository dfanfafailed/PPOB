<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_admin';
    protected $guarded = ['id_admin'];
    protected $table = 'admin';

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_admin','id_pembayaran');
    }
    public function level()
    {
        return $this->hasOne(Level::class, 'id_level','id_level');
    }
}
