<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tarif extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tarif';
    protected $table = 'tarif';
    protected $guarded = ['id_tarif'];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_tarif', 'id_tarif');
    }
}
