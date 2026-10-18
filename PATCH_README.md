# PATCH UPDATE — Theme Biru + Animasi + PDF + Rich Text

Patch ini hanya berisi **file yang berubah** dari versi sebelumnya. Tinggal **timpa (overwrite)** ke folder project Laravel kamu di Laragon.

## Cara Install Patch

### 1. Backup dulu (opsional tapi disarankan)
```
cd C:\laragon\www
xcopy desa-ciwiru desa-ciwiru-backup /E /I
```

### 2. Ekstrak `desa-ciwiru-update.zip`
Ekstrak isinya, lalu **copy semua file**-nya ke `C:\laragon\www\desa-ciwiru\` → **pilih Replace All** ketika ditanya.

### 3. Install paket dompdf (untuk PDF surat)
```
cd C:\laragon\www\desa-ciwiru
composer require barryvdh/laravel-dompdf
```
(Atau jalankan `composer update` karena `composer.json` sudah saya update.)

### 4. Clear cache supaya theme baru ke-load
```
php artisan view:clear
php artisan config:clear
php artisan cache:clear
```

### 5. Selesai
Reload browser dengan **Ctrl+F5** (hard refresh) supaya CSS ter-update.

---

## File yang Berubah / Ditambahkan

| Status   | File |
|----------|------|
| BARU     | `public/img/logo.png` *(logo Desa Ciwiru)* |
| BARU     | `resources/views/admin/surat/pdf.blade.php` *(template PDF)* |
| TIMPA    | `composer.json` *(+ barryvdh/laravel-dompdf)* |
| TIMPA    | `resources/views/layouts/app.blade.php` *(theme biru, animasi, logo)* |
| TIMPA    | `resources/views/layouts/admin.blade.php` *(theme biru admin)* |
| TIMPA    | `resources/views/auth/login.blade.php` *(login biru + animasi)* |
| TIMPA    | `resources/views/public/home.blade.php` *(hero & animasi baru)* |
| TIMPA    | `resources/views/admin/posts/form.blade.php` *(CKEditor rich text)* |
| TIMPA    | `resources/views/admin/wisata/form.blade.php` *(CKEditor)* |
| TIMPA    | `resources/views/admin/umkm/form.blade.php` *(CKEditor)* |
| TIMPA    | `resources/views/admin/settings/index.blade.php` *(CKEditor untuk visi/misi/sejarah)* |
| TIMPA    | `resources/views/admin/surat/show.blade.php` *(tombol Cetak PDF)* |
| TIMPA    | `app/Http/Controllers/Admin/SuratController.php` *(method pdf)* |
| TIMPA    | `routes/web.php` *(route surat.pdf)* |
| TIMPA    | Beberapa view admin lain *(warna emerald → primary blue)* |

## Yang Berubah Secara Visual

### 🎨 Warna Baru (sesuai logo)
- **Primary**: Biru tua (#1e3a8a → #1d4ed8) — sesuai background logo
- **Secondary**: Kuning emas (#facc15 → #eab308) — sesuai padi/wadah di logo
- **Accent**: Hijau (#22c55e) — sesuai daun & gunung di logo
- Logo asli kamu tampil di header, footer, halaman login, dan PDF surat
- Tagline **"Tanjeur Winangun Kerta Wibawa"** tampil di banyak tempat

### ✨ Animasi Baru
- Hero blob animasi (floating particles)
- Logo berputar saat hover
- Card hover: lift + scale + shadow
- Button shine effect (cahaya melintas saat hover)
- Link underline animation (bergeser dari kanan-kiri)
- Running text dengan gradient kuning
- AOS scroll reveal di setiap section (fade-up, fade-left, zoom-in)
- Map marker custom: bulatan biru-kuning bertuliskan "DC"
- Animated marquee text di banner pengumuman
- Wave SVG di bawah hero section

### 📝 Rich Text Editor (CKEditor 5)
Aktif di form: **Berita**, **Wisata**, **UMKM**, dan **Pengaturan (Visi/Misi/Sejarah)**. Bisa bold/italic/heading/list/link/table.

### 🖨️ PDF Generator Surat
- Login admin → **Layanan Surat** → klik salah satu permohonan → tombol **Cetak PDF** (merah, kanan atas)
- Otomatis menggunakan logo desa di kop surat
- Format A4 dengan kop resmi (Pemerintah Kabupaten → Kecamatan → Desa)
- Nomor surat otomatis: `<ticket>/DS-CWR/<tahun>`
- TTD Kepala Desa (nama diambil dari Pengaturan)
- Stamp "SAH" diagonal untuk surat berstatus **disetujui/selesai**
- Watermark verifikasi tiket di footer

## Troubleshooting

### Setelah Install: Error "Class Barryvdh\DomPDF\Facade\Pdf not found"
```
composer require barryvdh/laravel-dompdf
php artisan config:clear
```

### CKEditor tidak muncul
Periksa koneksi internet (CKEditor dari CDN). Atau buka DevTools console untuk lihat error.

### Logo tidak muncul
Pastikan `public/img/logo.png` ada. Jalankan ulang: `php artisan storage:link`

### Theme masih warna lama
Hard refresh dengan **Ctrl+Shift+R** (Chrome/Firefox).
