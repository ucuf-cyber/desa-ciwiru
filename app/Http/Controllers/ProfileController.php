<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\SiteSetting;

class ProfileController extends Controller
{
    public function sejarah() { return view('public.profil.sejarah'); }
    public function visiMisi() { return view('public.profil.visi-misi'); }
    public function geografis() { return view('public.profil.geografis'); }
    public function demografis() {
        $stats = [
            'total' => (int) SiteSetting::get('jumlah_penduduk', 0),
            'laki' => (int) SiteSetting::get('jumlah_laki', 0),
            'perempuan' => (int) SiteSetting::get('jumlah_perempuan', 0),
            'kk' => (int) SiteSetting::get('jumlah_kk', 0),
        ];
        return view('public.profil.demografis', compact('stats'));
    }
    public function organisasi() {
        $officials = Official::orderBy('sort_order')->get();
        return view('public.organisasi', compact('officials'));
    }
}
