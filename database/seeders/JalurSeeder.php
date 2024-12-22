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
            'map_basecamp' => 'https://maps.app.goo.gl/Mn3kiXcKEmtoqdqc6',
            'gambar_jalur' => 'img_image_merbabu_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung1->id,  // Mengaitkan dengan Gunung Merbabu
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
            'gambar_jalur' => 'img_image_merbabu_jalur.jpg',
            'biaya' => 20000,
            'id_gunung' => $gunung1->id,  // Mengaitkan dengan Gunung Merbabu
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
            'gambar_jalur' => 'img_image_merbabu_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung1->id,  // Mengaitkan dengan Gunung Merbabu
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
            'gambar_jalur' => 'img_image_merbabu_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung1->id,  // Mengaitkan dengan Gunung Merbabu
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
            'gambar_jalur' => 'img_image_merbabu_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung1->id,  // Mengaitkan dengan Gunung Merbabu
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
            'gambar_jalur' => 'img_image_slamet_jalur.png',
            'biaya' => 15000,
            'id_gunung' => $gunung2->id,  // Mengaitkan dengan Gunung Slamet
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
            'gambar_jalur' => 'img_image_slamet_jalur.png',
            'biaya' => 20000,
            'id_gunung' => $gunung2->id,  // Mengaitkan dengan Gunung Slamet
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
            'gambar_jalur' => 'img_image_slamet_jalur.png',
            'biaya' => 15000,
            'id_gunung' => $gunung2->id,  // Mengaitkan dengan Gunung Slamet
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
            'gambar_jalur' => 'img_image_slamet_jalur.png',
            'biaya' => 15000,
            'id_gunung' => $gunung2->id,  // Mengaitkan dengan Gunung Slamet
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
            'gambar_jalur' => 'img_image_slamet_jalur.png',
            'biaya' => 15000,
            'id_gunung' => $gunung2->id,  // Mengaitkan dengan Gunung Slamet
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
            'gambar_jalur' => 'img_image_sumbing_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung3->id,  // Mengaitkan dengan Gunung Sumbing
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
            'gambar_jalur' => 'img_image_sumbing_jalur.jpg',
            'biaya' => 20000,
            'id_gunung' => $gunung3->id,  // Mengaitkan dengan Gunung Sumbing
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
            'gambar_jalur' => 'img_image_sumbing_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung3->id,  // Mengaitkan dengan Gunung Sumbing
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
            'gambar_jalur' => 'img_image_sumbing_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung3->id,  // Mengaitkan dengan Gunung Sumbing
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
            'gambar_jalur' => 'img_image_sumbing_jalur.jpg',
            'biaya' => 15000,
            'id_gunung' => $gunung3->id,  // Mengaitkan dengan Gunung Sumbing
        ]);

        // // Mengaitkan jalur dengan gunung menggunakan relasi pivot

        // $gunung1->jalur()->attach([$jalur1->id, $jalur2->id, $jalur3->id, $jalur4->id, $jalur5->id]);
        // $gunung2->jalur()->attach([$jalur6->id, $jalur7->id, $jalur8->id, $jalur9->id, $jalur10->id]);
        // $gunung3->jalur()->attach([$jalur11->id, $jalur12->id, $jalur13->id, $jalur14->id, $jalur15->id]);
    }
}
