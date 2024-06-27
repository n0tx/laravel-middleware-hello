<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'pelanggan_id',
        'tanggal_pesan',
        'status',
    ];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class);
    }

    public function menu() {
        return $this->belongsToMany(Menu::class)->withPivot('jumlah');
    }

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class);
    }



}
