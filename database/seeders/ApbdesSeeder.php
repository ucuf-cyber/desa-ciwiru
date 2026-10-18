<?php

namespace Database\Seeders;

use App\Models\Apbdes;
use Illuminate\Database\Seeder;

class ApbdesSeeder extends Seeder
{
    public function run(): void
    {
        $years = [2023, 2024];
        $data = [
            ['type'=>'pendapatan','category'=>'Dana Desa (DD)','planned'=>900000000,'realized'=>895000000],
            ['type'=>'pendapatan','category'=>'Alokasi Dana Desa (ADD)','planned'=>450000000,'realized'=>450000000],
            ['type'=>'pendapatan','category'=>'Bagi Hasil Pajak & Retribusi','planned'=>50000000,'realized'=>48000000],
            ['type'=>'pendapatan','category'=>'PAD Desa','planned'=>30000000,'realized'=>28000000],
            ['type'=>'belanja','category'=>'Penyelenggaraan Pemerintahan Desa','planned'=>420000000,'realized'=>415000000],
            ['type'=>'belanja','category'=>'Pelaksanaan Pembangunan Desa','planned'=>620000000,'realized'=>610000000],
            ['type'=>'belanja','category'=>'Pembinaan Kemasyarakatan','planned'=>180000000,'realized'=>175000000],
            ['type'=>'belanja','category'=>'Pemberdayaan Masyarakat','planned'=>150000000,'realized'=>148000000],
            ['type'=>'belanja','category'=>'Penanggulangan Bencana, Darurat & Mendesak','planned'=>60000000,'realized'=>55000000],
            ['type'=>'pembiayaan','category'=>'SiLPA Tahun Sebelumnya','planned'=>0,'realized'=>2000000],
        ];

        foreach ($years as $year) {
            foreach ($data as $d) {
                Apbdes::create(array_merge($d, [
                    'year' => $year,
                    'description' => $d['category'] . ' tahun anggaran ' . $year,
                    'quarter' => 'TAHUNAN',
                ]));
            }
        }
    }
}
