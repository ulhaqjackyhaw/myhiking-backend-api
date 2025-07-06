
# MyHiking Backend API & Web Admin

> Backend API dan Web Admin untuk aplikasi pendakian gunung (MyHiking). Dibangun menggunakan Laravel.

## Fitur Utama

- **RESTful API** untuk aplikasi mobile/klien eksternal
- **Web Admin** untuk pengelolaan data gunung, jalur, pesanan, anggota, pembayaran, dan user
- Manajemen user, otorisasi, dan autentikasi
- Pengelolaan data wilayah (provinsi, kabupaten, kecamatan, desa)
- Manajemen transaksi dan pembayaran
- Laporan dan monitoring aktivitas pendakian

## Struktur Project

- `app/Models/` : Model data utama (Gunung, Jalur, Pesanan, User, dsb)
- `app/Http/Controllers/` : Controller untuk API & Web Admin
- `routes/api.php` : Routing endpoint API
- `routes/web.php` : Routing halaman web admin
- `resources/views/` : Blade template untuk web admin

## Instalasi & Setup

1. **Clone repository**
   ```bash
   git clone <repo-url>
   cd myhiking-backend-api
   ```
2. **Install dependency**
   ```bash
   composer install
   npm install && npm run build
   ```
3. **Copy file environment**
   ```bash
   cp .env.example .env
   ```
4. **Generate key**
   ```bash
   php artisan key:generate
   ```
5. **Migrasi & seeder database**
   ```bash
   php artisan migrate --seed
   ```
6. **Jalankan server**
   ```bash
   php artisan serve
   ```

## Dokumentasi API

Endpoint API tersedia di `routes/api.php`. Contoh endpoint:

- `GET /api/gunung` — Daftar gunung
- `POST /api/pesanan` — Membuat pesanan pendakian
- `GET /api/user` — Data user

Gunakan tools seperti Postman untuk eksplorasi endpoint.


## Web Admin

Web admin dapat diakses melalui browser pada route yang telah disediakan di `routes/web.php`. Fitur utama:

- Manajemen data gunung, jalur, pesanan, anggota
- Monitoring transaksi dan laporan
- Manajemen user dan admin

### Demo Web Admin

[Lihat demo di YouTube](https://youtu.be/cbiylzg3crQ)

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.

## Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
