# Website Desa Ciwiru

Website informasi dan layanan online untuk Desa Ciwiru, Kecamatan Pasawahan, Kabupaten Kuningan.

Dibuat dengan Laravel 11. Isinya ada halaman informasi untuk warga (profil desa, berita, wisata, UMKM, APBDes, statistik penduduk) dan panel admin untuk perangkat desa. Warga juga bisa mengajukan surat dan pengaduan secara online, lalu cek statusnya pakai nomor tiket.

![Beranda](docs/screenshots/home.jpg)

## Fitur

Halaman publik:

- Beranda: ringkasan data penduduk, pengumuman, agenda, berita terbaru, wisata, UMKM, dan peta lokasi desa
- Profil desa: sejarah, visi misi, geografis, demografis, struktur organisasi
- Berita dan galeri foto
- Wisata dan UMKM, masing-masing ada halaman detailnya
- APBDes: rincian pendapatan dan belanja desa per tahun
- Statistik penduduk dalam bentuk grafik (usia, pendidikan, pekerjaan, agama)
- Form kontak

Layanan online:

- Permohonan surat. Ada 6 jenis: Keterangan Domisili, Keterangan Usaha, Keterangan Tidak Mampu, dan lainnya. Setelah submit, warga dapat nomor tiket.
- Pengaduan masyarakat
- Cek status surat atau pengaduan pakai nomor tiket

Panel admin:

- Dashboard: jumlah kunjungan, grafik kunjungan 14 hari terakhir, berita paling banyak dibaca, surat dan pengaduan terbaru
- Kelola berita, galeri, wisata, UMKM, APBDes, perangkat desa, dan user
- Editor teks pakai CKEditor 5
- Proses surat dan pengaduan (ubah status, tambah catatan)
- Cetak surat ke PDF. Sudah ada kop surat desa, nomor surat otomatis, tanda tangan kepala desa, dan stempel "SAH" kalau suratnya sudah disetujui.
- Pengaturan identitas desa, kontak, data penduduk, dan teks running text
- Hak akses berdasarkan role: super_admin, admin, operator, kepala_desa, masyarakat

## Screenshot

### Halaman Publik

| Berita | Wisata |
|---|---|
| ![Berita](docs/screenshots/berita.jpg) | ![Wisata](docs/screenshots/wisata.jpg) |

| UMKM | Galeri |
|---|---|
| ![UMKM](docs/screenshots/umkm.jpg) | ![Galeri](docs/screenshots/galeri.jpg) |

| Statistik | APBDes |
|---|---|
| ![Statistik](docs/screenshots/statistik.jpg) | ![APBDes](docs/screenshots/anggaran.jpg) |

| Struktur Organisasi | Login |
|---|---|
| ![Organisasi](docs/screenshots/organisasi.jpg) | ![Login](docs/screenshots/login.jpg) |

### Layanan Surat

| Form Permohonan | Cek Status |
|---|---|
| ![Form surat](docs/screenshots/layanan-surat.jpg) | ![Tracking](docs/screenshots/tracking.jpg) |

### Panel Admin

| Dashboard | Detail Surat & Cetak PDF |
|---|---|
| ![Dashboard](docs/screenshots/admin-dashboard.jpg) | ![Detail surat](docs/screenshots/admin-surat-detail.jpg) |

| Daftar Berita | Tambah Berita |
|---|---|
| ![Daftar berita](docs/screenshots/admin-berita.jpg) | ![Form berita](docs/screenshots/admin-berita-form.jpg) |

| APBDes | Pengaturan |
|---|---|
| ![Admin APBDes](docs/screenshots/admin-apbdes.jpg) | ![Pengaturan](docs/screenshots/admin-pengaturan.jpg) |

| Permohonan Surat | Pengaduan |
|---|---|
| ![Daftar surat](docs/screenshots/admin-surat.jpg) | ![Pengaduan](docs/screenshots/admin-pengaduan.jpg) |

### Tampilan HP

<img src="docs/screenshots/mobile.jpg" alt="Tampilan HP" width="300">

Screenshot beranda satu halaman penuh ada di [docs/screenshots/home-full.jpg](docs/screenshots/home-full.jpg).

## Teknologi

- Laravel 11 (PHP 8.2)
- MySQL
- Blade, Tailwind CSS, Alpine.js
- Chart.js untuk grafik
- Leaflet + OpenStreetMap untuk peta
- CKEditor 5
- AOS untuk animasi scroll
- barryvdh/laravel-dompdf untuk PDF surat

CSS dan JS diambil dari CDN, jadi tidak perlu `npm install` atau build.

## Cara Install

Yang dibutuhkan: PHP 8.2 ke atas, Composer, dan MySQL. Saya pakai Laragon di Windows.

```bash
git clone https://github.com/ucuf-cyber/desa-ciwiru.git
cd desa-ciwiru

composer install
cp .env.example .env
php artisan key:generate
```

Buat database `desa_ciwiru`, lalu sesuaikan `DB_USERNAME` dan `DB_PASSWORD` di file `.env`. Setelah itu:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Buka `http://127.0.0.1:8000`. Kalau pakai Laragon, bisa langsung buka `http://desa-ciwiru.test`.

## Akun Demo

Password semua akun: `password`

| Role | Email |
|---|---|
| Super Admin | superadmin@desa-ciwiru.id |
| Admin | admin@desa-ciwiru.id |
| Operator | operator@desa-ciwiru.id |
| Kepala Desa | kepaladesa@desa-ciwiru.id |
| Masyarakat | warga@desa-ciwiru.id |

Halaman admin ada di `/admin`, login lewat `/login`.

## Struktur Folder

```
app/Http/Controllers/         controller halaman publik
app/Http/Controllers/Admin/   controller panel admin
app/Http/Middleware/          cek role dan pencatat kunjungan
app/Models/                   model database
database/seeders/             data contoh
resources/views/public/       tampilan halaman publik
resources/views/admin/        tampilan admin + template PDF surat
routes/web.php                daftar route
```

## Lisensi

MIT
