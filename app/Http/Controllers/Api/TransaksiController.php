<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    // public function index()
    // {
    //     try{
    //         $transaksi = Transaksi::all();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully get data on transaksi',
    //             'data' => $transaksi,
    //         ], 200);
    //     }catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to get data on transaksi',
    //             'data' => $e->getMessage(),
    //         ], 500);
    //     }

    // }


    public function index()
    {
        try{
            // Mengambil semua data transaksi dari database
            $transaksi = Transaksi::with("pesanan.gunung", "pesanan.jalur")->get()->map(function ($item) {
            // $status = 'Unverified';
            // if ($item->status == 'Verivied') {
            //     $status = 'Verified';
            // }

                return [
                    "id" => (string) $item->id,
                    "id_pesanan" => $item->id_pesanan,
                    "metode_pembayaran" => $item->metode_pembayaran,
                    "total_bayar" => $item->total_bayar,
                    "status" => $item->status_pesanan,
                    "waktu_pembayaran" => $item->waktu_pembayaran,
                    "bukti" => $item->bukti,
                    "gunung" => $item->pesanan->gunung->nama,
                    "jalur" => $item->pesanan->jalur->nama
                ];
            });

            // Mengembalikan response dalam format JSON
            return response()->json([
                'success' => true,
                'message' => 'Successfully get data on transaksi',
                'data' => $transaksi,
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get data on transaksi',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

        public function create(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_pesanan' => 'required|exists:pesanan,id',
            'metode_pembayaran' => 'required|string|max:60',
            'total_bayar' => 'required|integer|min:0',
            'status_pesanan' => 'required|in:Verified,Unverified',
            'waktu_pembayaran' => 'required|date',
            // 'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal ukuran 2 MB
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal ukuran 2 MB
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Simpan file bukti pembayaran
            $filePath = $request->file('bukti')->store('bukti_pembayaran', 'public');

            // Tambahkan data transaksi
            $transaksi = Transaksi::create([
                'id_pesanan' => $request->id_pesanan,
                'metode_pembayaran' => $request->metode_pembayaran,
                'total_bayar' => $request->total_bayar,
                'status_pesanan' => $request->status_pesanan,
                'waktu_pembayaran' => $request->waktu_pembayaran,
                'bukti' => $filePath,
            ]);

            return response()->json([
                'message' => 'Transaksi berhasil ditambahkan.',
                'transaksi' => $transaksi,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menambahkan transaksi.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
