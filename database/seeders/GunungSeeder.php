<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GunungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gunung')->insert([
            [
                'nama' => 'Gunung Merbabu',
                'deskripsi' => 'Gunung Merbabu adalah gunung berapi bertipe stratovolcano yang terletak di Jawa Tengah.',
                'gambar' => 'http://localhost:8000/images/img_image.png', // Perbaiki kesalahan ketik
                'ketinggian' => 3142,
                'province_id' => 1, // Sesuaikan jika ada
                'regency_id' => null, // Sesuaikan jika ada
                'district_id' => null, // Sesuaikan jika ada
                'village_id' => null, // Sesuaikan jika ada
            ],
            [
                'nama' => 'Gunung Slamet',
                'deskripsi' => 'Gunung Slamet adalah gunung berapi tertinggi di Jawa Tengah.',
                'gambar' => 'http://localhost:8000/images/img_image_158x314.png',
                'ketinggian' => 3428, // Update jika perlu
                'province_id' => 1,
                'regency_id' => null,
                'district_id' => null,
                'village_id' => null,
            ],
            [
                'nama' => 'Gunung Sumbing',
                'deskripsi' => 'Gunung Sumbing adalah gunung berapi yang terletak di Jawa Tengah.',
                'gambar' => 'http://localhost:8000/images/img_image_156x316.png',
                'ketinggian' => 3371, // Update jika perlu
                'province_id' => 1,
                'regency_id' => null,
                'district_id' => null,
                'village_id' => null,
            ],
        ]);
    }
}
