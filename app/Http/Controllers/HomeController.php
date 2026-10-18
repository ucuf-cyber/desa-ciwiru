<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Announcement;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Umkm;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::published()->with('category')->orderByDesc('published_at')->take(6)->get();
        $featuredWisata = Wisata::where('status','published')->orderBy('id')->take(3)->get();
        $featuredUmkm = Umkm::where('status','published')->latest()->take(6)->get();
        $announcements = Announcement::orderByDesc('is_pinned')->orderByDesc('published_at')->take(4)->get();
        $agendas = Agenda::where('start_at','>=', now())->orderBy('start_at')->take(5)->get();

        $stats = [
            'penduduk' => SiteSetting::get('jumlah_penduduk', 0),
            'kk' => SiteSetting::get('jumlah_kk', 0),
            'laki' => SiteSetting::get('jumlah_laki', 0),
            'perempuan' => SiteSetting::get('jumlah_perempuan', 0),
            'luas' => SiteSetting::get('luas_wilayah', 0),
            'dusun' => SiteSetting::get('jumlah_dusun', 0),
        ];

        return view('public.home', compact('latestPosts','featuredWisata','featuredUmkm','announcements','agendas','stats'));
    }

    public function kontak() { return view('public.kontak'); }

    public function kirimKontak(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);
        \App\Models\ContactMessage::create($data);
        return back()->with('success','Pesan Anda telah terkirim. Terima kasih!');
    }
}
