<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'level';
    protected $primaryKey = 'id_level';
    protected $guarded = ['id_level'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_level', 'id_admin');
    }
}

