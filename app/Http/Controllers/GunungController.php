<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use Illuminate\Http\Request;

class GunungController extends Controller
{
    public function index()
    {
        $gunung = Gunung::all();
        return response()->json($gunung);
    }

    // public function store(Request $request)
    // {
    //     $gunung = Gunung::create([
    //         'nama' => $request->nama,
    //         'ketinggian' => $request->ketinggian,
    //     ]);

    //     return response()->json($gunung);
    // }


    public function getGunungForBeranda()
    {
        // Ambil hanya kolom yang dibutuhkan
        $gunungList = Gunung::select('nama', 'gambar')->get();

        return response()->json($gunungList);
    }

}

