<?php

namespace Database\Seeders;

use App\Models\RunningText;
use Illuminate\Database\Seeder;

class RunningTextSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'Selamat datang di Website Resmi Pemerintah Desa Ciwiru, Kecamatan Pasawahan, Kabupaten Kuningan',
            'Layanan Surat Online kini tersedia 24 jam - Ajukan permohonan tanpa antri',
            'Mari dukung produk UMKM Desa Ciwiru sebagai bentuk kecintaan terhadap kampung halaman',
            'Wisata alam kaki Gunung Ciremai menanti kunjungan Anda di Desa Ciwiru',
        ];

        foreach ($items as $i => $text) {
            RunningText::create(['text' => $text, 'sort_order' => $i, 'is_active' => true]);
        }
    }
}
