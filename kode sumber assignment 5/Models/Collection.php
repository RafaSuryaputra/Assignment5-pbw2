<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'jumlahKoleksi',
        'jumlahSisa',
        'jumlahKeluar'
    ];
    const CREATED_AT = 'createdAt';
}

// RAFA SURYAPUTRA - 6706223162
