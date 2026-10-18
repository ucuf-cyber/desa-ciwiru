<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            ['name' => 'Diani Rahman, SE', 'position' => 'Kepala Desa', 'division' => 'Pimpinan', 'sort_order' => 1, 'bio' => 'Kepala Desa Ciwiru periode 2019-2026, fokus pada digitalisasi pelayanan dan pengembangan desa wisata.'],
            ['name' => 'H. Asep Saepudin', 'position' => 'Sekretaris Desa', 'division' => 'Sekretariat', 'sort_order' => 2, 'bio' => 'Membantu kepala desa dalam tugas administratif dan koordinasi perangkat desa.'],
            ['name' => 'Wawan Setiawan', 'position' => 'Kaur Tata Usaha & Umum', 'division' => 'Sekretariat', 'sort_order' => 3],
            ['name' => 'Rina Marlina', 'position' => 'Kaur Keuangan', 'division' => 'Sekretariat', 'sort_order' => 4],
            ['name' => 'Dadang Hermawan', 'position' => 'Kaur Perencanaan', 'division' => 'Sekretariat', 'sort_order' => 5],
            ['name' => 'Fahri Nugraha', 'position' => 'Kasi Pemerintahan', 'division' => 'Pelaksana Teknis', 'sort_order' => 6, 'bio' => 'Bertugas dalam pelayanan administrasi pemerintahan dan kependudukan.'],
            ['name' => 'Aep Saepuloh', 'position' => 'Kasi Kesejahteraan', 'division' => 'Pelaksana Teknis', 'sort_order' => 7],
            ['name' => 'Yayan Suryana', 'position' => 'Kasi Pelayanan', 'division' => 'Pelaksana Teknis', 'sort_order' => 8],
            ['name' => 'Asep Iwan', 'position' => 'Kepala Dusun I (Ciwiru Tengah)', 'division' => 'Kewilayahan', 'sort_order' => 9],
            ['name' => 'Ujang Kurnia', 'position' => 'Kepala Dusun II (Cimanggu)', 'division' => 'Kewilayahan', 'sort_order' => 10],
            ['name' => 'Toto Sutarto', 'position' => 'Kepala Dusun III (Pasir Bungur)', 'division' => 'Kewilayahan', 'sort_order' => 11],
            ['name' => 'Endang Sumardi', 'position' => 'Kepala Dusun IV (Sukasari)', 'division' => 'Kewilayahan', 'sort_order' => 12],
        ];

        foreach ($officials as $o) {
            Official::create(array_merge(['period_start' => '2019-01-01', 'period_end' => '2026-12-31'], $o));
        }
    }
}
