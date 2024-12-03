<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalur;
use App\Models\Gunung; // pastikan menggunakan Gunung jika diperlukan

class DetailJalurGunungController extends Controller
{
    public function index($id_gunung, $id_jalur)
    {
        // Mencari jalur berdasarkan ID jalur dan memastikan relasi dengan gunung
        $jalur = Jalur::with(['gunung', 'village', 'district', 'regency', 'province'])
            ->where('id', $id_jalur)
            ->where('id_gunung', $id_gunung)
            ->first();

        // Mengecek apakah jalur ditemukan
        if (!$jalur) {
            return response()->json([
                'status' => false,
                'message' => 'Jalur not found or not associated with the specified gunung',
            ], 404); // Mengembalikan status 404 jika jalur tidak ditemukan
        }
        $imageUrl = url('/images/' . $jalur->gambar_jalur); // Sesuaikan dengan tempat penyimpanan gambar Anda

        // Membuat array hasil yang diformat
        $result = [
            'id' => $jalur->id,
            'nama' => $jalur->nama,
            'deskripsi' => $jalur->deskripsi,
            'map_basecamp' => $jalur->map_basecamp,
            'village' => $jalur->village ? $jalur->village->name : null,
            'district' => $jalur->district ? $jalur->district->name : null,
            'regency' => $jalur->regency ? $jalur->regency->name : null,
            'province' => $jalur->province ? $jalur->province->name : null,
            'jarak' => $jalur->jarak,
            'gambar' => $imageUrl,
            'biaya' => $jalur->biaya,
            'gunung' => [
                'id' => $jalur->gunung->id,
                'nama' => $jalur->gunung->nama,
                'ketinggian' => $jalur->gunung->ketinggian,
                'province' => $jalur->gunung->province ? $jalur->gunung->province->name : null,
            ],
        ];

        // Mengembalikan response JSON dengan data jalur
        return response()->json([
            'status' => true,
            'message' => 'Jalur details fetched successfully',
            'jalur' => $result
        ]);
    }

    public function JalurBooking($id_gunung, $id_jalur)
    {
        // Mencari jalur berdasarkan ID jalur dan memastikan relasi dengan gunung
        $jalur = Jalur::with(['gunung', 'village', 'district', 'regency', 'province'])
            ->where('id', $id_jalur)
            ->where('id_gunung', $id_gunung)
            ->first();

        // Mengecek apakah jalur ditemukan
        if (!$jalur) {
            return response()->json([
                'status' => false,
                'message' => 'Jalur not found or not associated with the specified gunung',
            ], 404); // Mengembalikan status 404 jika jalur tidak ditemukan
        }
        $imageUrl = url('/images/' . $jalur->gambar_jalur); // Sesuaikan dengan tempat penyimpanan gambar Anda

        // Membuat array hasil yang diformat
        $result = [
            'id' => $jalur->id,
            'nama' => $jalur->nama,
            'village' => $jalur->village ? $jalur->village->name : null,
            'district' => $jalur->district ? $jalur->district->name : null,
            'regency' => $jalur->regency ? $jalur->regency->name : null,
            'province' => $jalur->province ? $jalur->province->name : null,
            'gambar' => $imageUrl,
            'biaya' => $jalur->biaya,
            'gunung' => [
                'id' => $jalur->gunung->id,
                'nama' => $jalur->gunung->nama,
                'ketinggian' => $jalur->gunung->ketinggian,
                'province' => $jalur->gunung->province ? $jalur->gunung->province->name : null,
            ],
        ];

        // Mengembalikan response JSON dengan data jalur
        return response()->json([
            'status' => true,
            'message' => 'Jalur details fetched successfully',
            'jalur' => $result
        ]);
    }
}
