<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jalur;
use App\Models\Gunung;
use Illuminate\Http\Request;

class JalurController extends Controller
{
    // public function index($id_gunung)
    // {
    //     // Cari gunung berdasarkan ID
    //     $gunung = Gunung::findOrFail($id_gunung);  // Jika tidak ditemukan, akan otomatis 404

    //     // Ambil semua jalur yang berhubungan dengan gunung
    //     $jalur = $gunung->jalur;

    //     // Kembalikan data jalur dalam format JSON
    //     return response()->json($jalur);
    // }

    public function index($id_gunung)
    {
        $gunung = Gunung::with(['jalur'])->findOrFail($id_gunung);

        return response()->json([
            'status' => true,
            'message' => 'Jalur fetched successfully',
            'gunung' => [
                'id' => $gunung->id,
                'nama' => $gunung->nama,
                'ketinggian' => $gunung->ketinggian,
                'province' => $gunung->province->name ?: null,
                'data' => $gunung->jalur->map(function ($jalur) {
                    return [
                        'id' => $jalur->id,
                        'nama' => $jalur->nama,
                        'deskripsi' => $jalur->deskripsi,
                        'map_basecamp' => $jalur->map_basecamp,
                        'village' => $jalur->village ? $jalur->village->name : null, // Desa
                        'district' => $jalur->district ? $jalur->district->name : null, // Distrik
                        'regency' => $jalur->regency ? $jalur->regency->name : null, // Kabupaten
                        'province' => $jalur->province->name ?: null,
                        'biaya' => $jalur->biaya,
                        'pivot' => $jalur->pivot, // Data dari tabel pivot
                    ];
                }),
            ]
        ]);
    }

}
