<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_gunung',
        'id_jalur',
        'id_user',
        'tanggal_naik',
        'tanggal_turun',
        'total_harga_tiket',
        'status',
    ];

    public function gunung()
    {
        return $this->belongsTo(Gunung::class, 'id_gunung');
    }

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'id_jalur');
    }

    // Relasi ke tabel `users` (pemesan utama)
    public function pemesan()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke tabel `anggota_pesanan` (anggota tambahan)
    public function anggota()
    {
        return $this->belongsToMany(User::class, 'anggota_pesanan', 'id_pesanan', 'id_user');
    }
}
