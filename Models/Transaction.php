<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'userIdPetugas',
        'userIdPeminjam',
        'tanggalPinjam',
        'tanggalSelesai',
    ];
}


// RAFA SURYAPUTRA - 6706223162