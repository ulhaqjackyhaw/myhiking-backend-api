<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gunung;
use App\Models\Jalur;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data gunung
        $gunung1 = Gunung::create([
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'nama' => 'Gunung Slamet',
            'deskripsi' => 'Gunung tertinggi di Jawa Tengah',
            'ketinggian' => 3428,
            'gambar' => 'img_image_158x314.png',
        ]);

        $gunung2 = Gunung::create([
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'nama' => 'Gunung Merbabu',
            'deskripsi' => 'Gunung Merbabu adalah gunung berapi bertipe stratovolcano yang terletak di Jawa Tengah.',
            'ketinggian' => 3142,
            'gambar' => 'img_image.png',
        ]);

        $gunung3 = Gunung::create([
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'nama' => 'Gunung Sumbing',
            'deskripsi' => 'Gunung Sumbing adalah gunung berapi yang terletak di Jawa Tengah.',
            'ketinggian' => 3371,
            'gambar' => 'img_image_156x316.png',
        ]);

        // Menambahkan jalur pendakian untuk Gunung Slamet
        Jalur::create([
            'id_gunung' => $gunung1->id,
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152007',
            'deskripsi' => 'Jalur pendakian melalui Bambangan',
            'map_basecamp' => 'Basecamp Bambangan',
            'biaya' => 15000
        ]);

        // Menambahkan jalur kedua
        Jalur::create([
            'id_gunung' => $gunung1->id,
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152008',
            'deskripsi' => 'Jalur pendakian melalui Kaliwadas',
            'map_basecamp' => 'Basecamp Kaliwadas',
            'biaya' => 20000
        ]);

        // Menambahkan jalur ketiga
        Jalur::create([
            'id_gunung' => $gunung1->id,
            'province_id' => '33',
            'regency_id' => '3328',
            'district_id' => '332815',
            'village_id' => '3328152009',
            'deskripsi' => 'Jalur pendakian melalui Guci',
            'map_basecamp' => 'Basecamp Guci',
            'biaya' => 18000
        ]);
    }
}
