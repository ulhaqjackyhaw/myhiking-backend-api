<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_pesanan',
        'metode_pembayaran', //
        'total_bayar',
        'status_pesanan',
        'waktu_pembayaran',
        'bukti',
    ];

    // Relasi ke model Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaksi_id');
    }
}
