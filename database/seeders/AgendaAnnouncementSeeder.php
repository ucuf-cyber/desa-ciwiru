<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AgendaAnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            ['title' => 'Musyawarah Desa Bulanan', 'description' => 'Musyawarah rutin perangkat desa, BPD, dan tokoh masyarakat.', 'start_at' => now()->addDays(3)->setTime(19,30), 'location' => 'Balai Desa Ciwiru'],
            ['title' => 'Posyandu Balita Dusun I', 'description' => 'Pemeriksaan kesehatan dan timbang balita.', 'start_at' => now()->addDays(5)->setTime(8,0), 'location' => 'Posyandu Dusun I'],
            ['title' => 'Pelatihan UMKM Online', 'description' => 'Pelatihan digital marketing untuk pelaku UMKM Desa Ciwiru.', 'start_at' => now()->addDays(10)->setTime(13,0), 'location' => 'Balai Desa Ciwiru'],
            ['title' => 'Gotong Royong Bersih Desa', 'description' => 'Kegiatan gotong royong membersihkan lingkungan desa.', 'start_at' => now()->addDays(7)->setTime(6,30), 'location' => 'Seluruh Dusun'],
            ['title' => 'Peringatan HUT Kemerdekaan RI', 'description' => 'Upacara dan lomba memperingati HUT RI.', 'start_at' => now()->addMonths(2)->setTime(8,0), 'location' => 'Lapangan Desa Ciwiru'],
        ];
        foreach ($agendas as $a) Agenda::create(array_merge($a, ['end_at' => $a['start_at']->copy()->addHours(3)]));

        $announcements = [
            ['title' => 'Pengumuman Layanan Surat Online', 'body' => 'Mulai 1 Januari 2025, layanan permohonan surat dapat diajukan secara online melalui website desa. Cek menu Layanan > Surat Online.', 'is_pinned' => true],
            ['title' => 'Jadwal Pelayanan Kantor Desa', 'body' => 'Senin - Kamis: 08.00 - 15.00 WIB. Jumat: 08.00 - 11.00 WIB. Sabtu & Minggu: Libur.', 'is_pinned' => true],
            ['title' => 'Pemberitahuan Pendataan Penerima Bansos', 'body' => 'Pendataan calon penerima bantuan sosial akan dilakukan di tiap dusun pada minggu ke-2 dan ke-3 bulan ini.', 'is_pinned' => false],
        ];
        foreach ($announcements as $a) Announcement::create(array_merge($a, ['published_at' => now()->subDays(random_int(0,10))]));
    }
}
