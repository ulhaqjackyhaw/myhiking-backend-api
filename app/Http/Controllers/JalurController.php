<?php

namespace App\Http\Controllers;

use App\Models\DistrictWeb;
use App\Models\GunungWeb;
use App\Models\JalurWeb;
use App\Models\ProvinceWeb;
use App\Models\RegencyWeb;
use App\Models\VillageWeb;
use Illuminate\Http\Request;


class JalurController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian
        $search = $request->input('search');

        // Query data jalur dengan filter pencarian (jika ada)
        $jalur = JalurWeb::with(['gunung', 'province', 'regency'])
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->get();

        // Tampilkan ke view
        return view('jalur.index', compact('jalur'));
    }

    public function create()
    {
        $pegunungan = GunungWeb::all();
        $province_id = ProvinceWeb::all(); // Mengambil semua data provinsi
        $regency_id = RegencyWeb::all(); // Mengambil semua data provinsi
        $district_id = DistrictWeb::all(); // Mengambil semua data provinsi
        $village_id = VillageWeb::all(); // Mengambil semua data provinsi
        return view('jalur.create', compact('province_id', 'regency_id', 'district_id', 'village_id', 'pegunungan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'province_id' => 'required|integer|exists:reg_provinces,id',
            'regency_id' => 'required|integer|exists:reg_regencies,id',
            'district_id' => 'required|integer|exists:reg_districts,id',
            'village_id' => 'required|integer|exists:reg_villages,id',
            'jarak' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:1000',
            'map_basecamp' => 'nullable|string|max:255',
            'gambar_jalur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biaya' => 'required|numeric|min:0',
        ]);

        // $path = null;
        if ($request->hasFile('gambar_jalur')) {
            $gambarPath = $request->file('gambar_jalur')->store('images', 'public');
            JalurWeb::create([
                'nama' => $request->nama,
                'id_gunung' => $request->id_gunung,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'jarak' => $request->jarak,
                'deskripsi' => $request->deskripsi,
                'map_basecamp' => $request->map_basecamp,
                'gambar_jalur' => $gambarPath,
                'biaya' => $request->biaya,
            ]);
        } else {
            JalurWeb::create([
                'nama' => $request->nama,
                'id_gunung' => $request->id_gunung,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'jarak' => $request->jarak,
                'deskripsi' => $request->deskripsi,
                'map_basecamp' => $request->map_basecamp,
                'biaya' => $request->biaya,
            ]);
        }
        

        return redirect()->route('jalur.index')->with('success', 'Jalur berhasil ditambahkan!');
    }

    public function show(JalurWeb $jalur)
    {
        return view('jalur.show', compact('jalur'));
    }

    public function edit($id)
    {
        $pegunungan = GunungWeb::all();
        $jalur = JalurWeb::findOrFail($id); // Ambil data jalur berdasarkan ID
        $provinces = ProvinceWeb::all(); // Ambil semua data provinsi
        $regencies = RegencyWeb::where('province_id', $jalur->province_id)->get(); // Kabupaten berdasarkan provinsi
        $districts = DistrictWeb::where('regency_id', $jalur->regency_id)->get(); // Kecamatan berdasarkan kabupaten
        $villages = VillageWeb::where('district_id', $jalur->district_id)->get(); // Desa berdasarkan kecamatan

        return view('jalur.edit', compact('jalur', 'provinces', 'regencies', 'districts', 'villages', 'pegunungan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'province_id' => 'required|integer|exists:reg_provinces,id',
        'regency_id' => 'required|integer|exists:reg_regencies,id',
        'district_id' => 'required|integer|exists:reg_districts,id',
        'village_id' => 'required|integer|exists:reg_villages,id',
        'jarak' => 'required|numeric|min:0',
        'deskripsi' => 'nullable|string|max:1000',
        'map_basecamp' => 'nullable|string|max:255',
        'gambar_jalur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'biaya' => 'required|numeric|min:0',
    ]);

    $jalur = JalurWeb::findOrFail($id);

    // Check if a new image file is uploaded
    if ($request->hasFile('gambar_jalur')) {
        // Delete old image if it exists
        if ($jalur->gambar_jalur && \Storage::disk('public')->exists($jalur->gambar_jalur)) {
            \Storage::disk('public')->delete($jalur->gambar_jalur);
        }

        // Store the new image
        $gambarPath = $request->file('gambar_jalur')->store('images', 'public');
        $jalur->gambar_jalur = $gambarPath;
    }

    // Update other fields
    $jalur->nama = $request->nama;
    $jalur->province_id = $request->province_id;
    $jalur->regency_id = $request->regency_id;
    $jalur->district_id = $request->district_id;
    $jalur->village_id = $request->village_id;
    $jalur->jarak = $request->jarak;
    $jalur->deskripsi = $request->deskripsi;
    $jalur->map_basecamp = $request->map_basecamp;
    $jalur->biaya = $request->biaya;

    $jalur->save();

    return redirect()->route('jalur.index')->with('success', 'Jalur berhasil diperbarui!');
}


    public function destroy($id)
    {
        $jalur = JalurWeb::findOrFail($id);
        $jalur->delete();
        return redirect()->route('jalur.index')->with('success', 'Jalur berhasil dihapus!');
    }
}