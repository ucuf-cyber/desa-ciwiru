<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\SuratRequest;
use Illuminate\Database\Seeder;

class SuratComplaintSeeder extends Seeder
{
    public function run(): void
    {
        SuratRequest::create([
            'ticket_number' => 'SRT-' . date('Ymd') . '-0001',
            'type' => 'SKTM',
            'requester_name' => 'Asep Saepudin',
            'requester_nik' => '3208001234567890',
            'requester_phone' => '082212345678',
            'requester_address' => 'Dusun Ciwiru Tengah RT 01 RW 01',
            'purpose' => 'Untuk persyaratan beasiswa sekolah anak.',
            'status' => 'selesai',
            'processed_at' => now()->subDays(2),
        ]);

        SuratRequest::create([
            'ticket_number' => 'SRT-' . date('Ymd') . '-0002',
            'type' => 'SKU',
            'requester_name' => 'Dadang Permana',
            'requester_nik' => '3208009876543210',
            'requester_phone' => '082298765432',
            'requester_address' => 'Dusun Cimanggu RT 02 RW 02',
            'purpose' => 'Persyaratan pengajuan KUR Bank BRI untuk usaha warung.',
            'status' => 'diverifikasi',
        ]);

        Complaint::create([
            'ticket_number' => 'PGD-' . date('Ymd') . '-0001',
            'reporter_name' => 'Warga Dusun Sukasari',
            'reporter_phone' => '082211223344',
            'is_anonymous' => false,
            'category' => 'Infrastruktur',
            'subject' => 'Lampu Jalan Padam',
            'description' => 'Beberapa lampu jalan di Dusun Sukasari padam total. Mohon segera diperbaiki untuk keamanan warga di malam hari.',
            'location' => 'Jalan utama Dusun Sukasari',
            'status' => 'diproses',
        ]);

        Complaint::create([
            'ticket_number' => 'PGD-' . date('Ymd') . '-0002',
            'is_anonymous' => true,
            'category' => 'Lingkungan',
            'subject' => 'Sampah di TPS Desa',
            'description' => 'Sampah di TPS sementara desa sudah menumpuk dan menimbulkan bau. Mohon koordinasi pengangkutan.',
            'location' => 'TPS Desa Ciwiru',
            'status' => 'baru',
        ]);
    }
}
