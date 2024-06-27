<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'pesanan_id',
        'jumlah_bayar',
        'tanggal_bayar',
        'jenis_pembayaran',
    ];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class);
    }
}
