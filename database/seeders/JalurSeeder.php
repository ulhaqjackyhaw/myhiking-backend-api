<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gunung;
use App\Models\Jalur;

class JalurSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan data gunung berdasarkan ID atau kriteria lainnya
        $gunung1 = Gunung::find(1); // Misal Gunung Merbabu
        $gunung2 = Gunung::find(2); // Misal Gunung Slamet
        $gunung3 = Gunung::find(3); // Misal Gunung Sumbing
        // Menambahkan data jalur
        $jalur1 = Jalur::create([
            'nama' => 'Jalur Selo',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Selo',
            'map_basecamp' => 'Basecamp Selo',
            'biaya' => 15000,
        ]);

        $jalur2 = Jalur::create([
            'nama' => 'Jalur Cuntel',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152008',
            'jarak' => '6',
            'deskripsi' => 'Jalur pendakian melalui Cuntel',
            'map_basecamp' => 'Basecamp Cuntel',
            'biaya' => 20000,
        ]);
        $jalur3 = Jalur::create([
            'nama' => 'Jalur Suwanting',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Suwanting',
            'map_basecamp' => 'Basecamp Suwanting',
            'biaya' => 15000,
        ]);
        $jalur4 = Jalur::create([
            'nama' => 'Jalur Thekelan',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Thekelan',
            'map_basecamp' => 'Basecamp Thekelan',
            'biaya' => 15000,
        ]);
        $jalur5 = Jalur::create([
            'nama' => 'Jalur Wekas',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '4',
            'deskripsi' => 'Jalur pendakian melalui Wekas',
            'map_basecamp' => 'Basecamp Wekas',
            'biaya' => 15000,
        ]);
        $jalur6 = Jalur::create([
            'nama' => 'Jalur Bambangan',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Bambangan',
            'map_basecamp' => 'Basecamp Bambangan',
            'biaya' => 15000,
        ]);

        $jalur7 = Jalur::create([
            'nama' => 'Jalur Kaliwadas',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152008',
            'jarak' => '6',
            'deskripsi' => 'Jalur pendakian melalui Kaliwadas',
            'map_basecamp' => 'Basecamp Kaliwadas',
            'biaya' => 20000,
        ]);
        $jalur8 = Jalur::create([
            'nama' => 'Jalur Guci',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Bambangan',
            'map_basecamp' => 'Basecamp Bambangan',
            'biaya' => 15000,
        ]);
        $jalur9 = Jalur::create([
            'nama' => 'Jalur Dipajaya',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Bambangan',
            'map_basecamp' => 'Basecamp Bambangan',
            'biaya' => 15000,
        ]);
        $jalur10 = Jalur::create([
            'nama' => 'Jalur Baturraden',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '4',
            'deskripsi' => 'Jalur pendakian melalui Bambangan',
            'map_basecamp' => 'Basecamp Bambangan',
            'biaya' => 15000,
        ]);
        $jalur11 = Jalur::create([
            'nama' => 'Jalur Mangli',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Mangli',
            'map_basecamp' => 'Basecamp Mangli',
            'biaya' => 15000,
        ]);

        $jalur12 = Jalur::create([
            'nama' => 'Jalur Gajah Mungkur',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152008',
            'jarak' => '6',
            'deskripsi' => 'Jalur pendakian melalui Gajah Mungkur',
            'map_basecamp' => 'Basecamp Gajah Mungkur',
            'biaya' => 20000,
        ]);
        $jalur13 = Jalur::create([
            'nama' => 'Jalur Cepit Parakan',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Cepit Parakan',
            'map_basecamp' => 'Basecamp Cepit Parakan',
            'biaya' => 15000,
        ]);
        $jalur14 = Jalur::create([
            'nama' => 'Jalur Bowongso',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '5',
            'deskripsi' => 'Jalur pendakian melalui Bowongso',
            'map_basecamp' => 'Basecamp Bowongso',
            'biaya' => 15000,
        ]);
        $jalur15 = Jalur::create([
            'nama' => 'Jalur Garung',
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'jarak' => '4',
            'deskripsi' => 'Jalur pendakian melalui Garung',
            'map_basecamp' => 'Basecamp Garung',
            'biaya' => 15000,
        ]);

        // // Mengaitkan jalur dengan gunung menggunakan relasi pivot

        // $gunung1->jalur()->attach([$jalur1->id, $jalur2->id, $jalur3->id, $jalur4->id, $jalur5->id]);
        // $gunung2->jalur()->attach([$jalur6->id, $jalur7->id, $jalur8->id, $jalur9->id, $jalur10->id]);
        // $gunung3->jalur()->attach([$jalur11->id, $jalur12->id, $jalur13->id, $jalur14->id, $jalur15->id]);
    }
}
