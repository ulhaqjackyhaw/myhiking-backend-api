<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiWeb extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'transaksi';

    // Kolom yang dapat diisi secara mass assignment
    protected $fillable = [
        'id_pesanan',
        'payment_id',
        'total_bayar',
        'status_pesanan',
        'waktu_pembayaran',
        'bukti',
    ];
        protected $attributes = [
            'status_pesanan' => 'Unverified',  // Pastikan ini ada
        ];

    /**
     * Relasi ke model Pesanan
     * Misalnya: Transaksi terkait dengan Pesanan melalui kolom `id_pesanan`
     */
    public function pesanan()
    {
        return $this->belongsTo(PesananWeb::class, 'id_pesanan');
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->waktu_pembayaran) || is_null($model->bukti)) {
                $model->status_pesanan = 'Incomplete';
            } else {
                $model->status_pesanan = 'Unverified';
            }
        });
    }
    /**
     * Scope untuk transaksi dengan metode pembayaran tertentu
     */
    public function scopeMetodePembayaran($query, $metode)
    {
        return $query->where('metode_pembayaran', $metode);
    }

    /**
     * Contoh accessor untuk format waktu pembayaran
     */
    public function getFormattedWaktuPembayaranAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->waktu_pembayaran));
    }

    // Menampilkan bukti pembayaran sebagai gambar
public function getBuktiUrlAttribute()
{
    // Mengecek apakah bukti ada, jika ada kembalikan URL file bukti
    if ($this->bukti) {
        return asset('storage/bukti/' . $this->bukti);
    }
    
    // Jika tidak ada bukti, kembalikan URL gambar default atau null
    return asset('images/no-image.png'); // Gambar default jika bukti tidak ditemukan
}
public function payment()
{
    return $this->belongsTo(Payment::class, 'payment_id');
}
}

