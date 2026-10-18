<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;

class StatistikController extends Controller
{
    public function index() {
        $data = [
            'total' => (int) SiteSetting::get('jumlah_penduduk', 0),
            'laki' => (int) SiteSetting::get('jumlah_laki', 0),
            'perempuan' => (int) SiteSetting::get('jumlah_perempuan', 0),
            'kk' => (int) SiteSetting::get('jumlah_kk', 0),
            'usia' => [
                ['label'=>'0-5','value'=>185],['label'=>'6-12','value'=>240],['label'=>'13-17','value'=>185],
                ['label'=>'18-25','value'=>290],['label'=>'26-35','value'=>340],['label'=>'36-45','value'=>320],
                ['label'=>'46-55','value'=>280],['label'=>'56-65','value'=>210],['label'=>'66+','value'=>165],
            ],
            'pendidikan' => [
                ['label'=>'Belum/Tidak Sekolah','value'=>140],['label'=>'SD/Sederajat','value'=>820],
                ['label'=>'SMP/Sederajat','value'=>540],['label'=>'SMA/Sederajat','value'=>520],
                ['label'=>'Diploma','value'=>85],['label'=>'Sarjana','value'=>95],['label'=>'Pascasarjana','value'=>15],
            ],
            'pekerjaan' => [
                ['label'=>'Petani','value'=>620],['label'=>'Peternak','value'=>180],['label'=>'Wiraswasta','value'=>320],
                ['label'=>'PNS/TNI/Polri','value'=>85],['label'=>'Karyawan Swasta','value'=>240],
                ['label'=>'Pelajar/Mahasiswa','value'=>520],['label'=>'IRT','value'=>180],['label'=>'Lainnya','value'=>70],
            ],
            'agama' => [
                ['label'=>'Islam','value'=>2180],['label'=>'Kristen','value'=>25],['label'=>'Katolik','value'=>8],['label'=>'Lainnya','value'=>2],
            ],
        ];
        return view('public.statistik', compact('data'));
    }
}
