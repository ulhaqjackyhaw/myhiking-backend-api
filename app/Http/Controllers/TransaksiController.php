<?php

namespace App\Http\Controllers;

use App\Models\TransaksiWeb;
use App\Http\Requests\TransaksiRequest; // Import Form Request
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
        $transaksi = TransaksiWeb::with('payment')->findOrFail($id); // Memuat relasi payment
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

    // Menambah transaksi baru
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_pesanan' => 'required|exists:pesanan,id',
        'payment_id' => 'required|exists:payments,id',
        'total_bayar' => 'required|integer',
        'waktu_pembayaran' => 'nullable|date',
        'bukti' => 'nullable|image|max:2048',
    ]);

    // Simpan bukti pembayaran ke storage jika ada
    if ($request->hasFile('bukti')) {
        $validatedData['bukti'] = $request->file('bukti')->store('bukti-pembayaran', 'public');
    }

    // Tentukan status berdasarkan kondisi
    if (!empty($validatedData['bukti']) && !empty($validatedData['waktu_pembayaran'])) {
        $validatedData['status_pesanan'] = 'Unverified';
    } else {
        $validatedData['status_pesanan'] = 'Incomplete';
    }

    TransaksiWeb::create($validatedData);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $transaksi = TransaksiWeb::findOrFail($id);

    $validatedData = $request->validate([
        'id_pesanan' => 'required|exists:pesanan,id',
        'payment_id' => 'required|exists:payments,id',
        'total_bayar' => 'required|integer',
        'waktu_pembayaran' => 'nullable|date',
        'bukti' => 'nullable|image|max:2048',
    ]);

    // Simpan bukti pembayaran ke storage jika ada
    if ($request->hasFile('bukti')) {
        $validatedData['bukti'] = $request->file('bukti')->store('bukti-pembayaran', 'public');
    }

    // Tentukan status berdasarkan kondisi
    if (!empty($validatedData['bukti']) && !empty($validatedData['waktu_pembayaran'])) {
        $validatedData['status_pesanan'] = 'Unverified';
    } else {
        $validatedData['status_pesanan'] = 'Incomplete';
    }

    $transaksi->update($validatedData);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
}
}
