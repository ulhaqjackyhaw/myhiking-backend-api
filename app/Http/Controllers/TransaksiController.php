<?php

namespace App\Http\Controllers;

use App\Models\TransaksiWeb;
use App\Models\PesananWeb; 
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index(Request $request)
    {
        $search = $request->get('search');
        $transaksis = TransaksiWeb::query()
            ->with('payment') // Memuat data relasi payment
            ->when($search, function ($query, $search) {
                return $query->where('id_pesanan', 'LIKE', "%{$search}%")
                    ->orWhereHas('payment', function ($q) use ($search) {
                        $q->where('nama_pembayaran', 'LIKE', "%{$search}%");
                    })
                    ->orWhere('status_pesanan', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    // Menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = TransaksiWeb::with('payment')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Memverifikasi transaksi
    public function verify($id)
        {
            $transaksi = TransaksiWeb::findOrFail($id);
            
            // Periksa apakah status pesanan adalah 'unverified'
            if ($transaksi->status_pesanan === 'Unverified') {
                $transaksi->status_pesanan = 'Verified';  // Ubah status menjadi 'verified'
                $transaksi->save();
            }

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diverifikasi');
        }

        public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'id_pesanan' => 'required|exists:pesanan,id',
            'payment_id' => 'required|exists:payments,id',
            'total_bayar' => 'required|integer',
            'waktu_pembayaran' => 'nullable|date',
            'bukti' => 'nullable|string',
        ]);

        // Tentukan status berdasarkan kondisi
        $status = 'Incomplete'; // Default status
        if (
            !empty($validatedData['bukti']) &&
            !empty($validatedData['waktu_pembayaran']) &&
            !empty($validatedData['total_bayar'])
        ) {
            $status = 'Verified';
        }

        // Simpan transaksi
        $transaksi = TransaksiWeb::create([
            'id_pesanan' => $validatedData['id_pesanan'],
            'payment_id' => $validatedData['payment_id'],
            'total_bayar' => $validatedData['total_bayar'],
            'waktu_pembayaran' => $validatedData['waktu_pembayaran'],
            'bukti' => $validatedData['bukti'],
            'status_pesanan' => $status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Temukan transaksi
        $transaksi = TransaksiWeb::findOrFail($id);

        // Validasi data input
        $validatedData = $request->validate([
            'id_pesanan' => 'nullable|exists:pesanan,id',
            'payment_id' => 'nullable|exists:payments,id',
            'total_bayar' => 'nullable|integer',
            'waktu_pembayaran' => 'nullable|date',
            'bukti' => 'nullable|string',
        ]);

        // Update data transaksi
        $transaksi->update($validatedData);

        // Tentukan status berdasarkan kondisi
        if (
            !empty($transaksi->bukti) &&
            !empty($transaksi->waktu_pembayaran) &&
            !empty($transaksi->total_bayar)
        ) {
            $transaksi->status_pesanan = 'Verified';
        } else {
            $transaksi->status_pesanan = 'Incomplete';
        }

        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaksi,
        ], 200);
    }

}
