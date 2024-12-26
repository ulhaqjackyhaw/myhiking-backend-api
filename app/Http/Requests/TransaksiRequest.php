<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
{
    public function authorize()
    {
        // Pastikan pengguna diizinkan untuk melakukan request ini
        return true;
    }

    public function rules()
    {
        return [
            'id_pesanan' => 'required|exists:pesanan,id',
            'payment_id' => 'required|exists:payments,id',
            'total_bayar' => 'required|integer|min:1',
            'waktu_pembayaran' => 'nullable|date',
            'bukti' => 'nullable|image|max:2048', // Pastikan bukti adalah file gambar
        ];
    }
}
