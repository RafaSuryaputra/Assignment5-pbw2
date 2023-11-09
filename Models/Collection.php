<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'jenis',
        'created_at',
        'jumlahAwal',
        'jumlahSisa',
        'jumlahKeluar',
    ];
}


// RAFA SURYAPUTRA - 6706223162