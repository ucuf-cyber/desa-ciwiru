<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\PageView;
use App\Models\Post;
use App\Models\SuratRequest;
use App\Models\Umkm;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'visitors_today' => PageView::whereDate('viewed_at', today())->count(),
            'visitors_total' => PageView::count(),
            'surat_pending' => SuratRequest::whereIn('status', ['pending','diverifikasi'])->count(),
            'complaints_new' => Complaint::whereIn('status', ['baru','diproses'])->count(),
            'posts_published' => Post::where('status','published')->count(),
            'wisata_total' => Wisata::count(),
            'umkm_total' => Umkm::count(),
        ];

        $visitorTrend = PageView::select(DB::raw('DATE(viewed_at) as day'), DB::raw('count(*) as total'))
            ->where('viewed_at', '>=', now()->subDays(13))
            ->groupBy('day')->orderBy('day')->get();

        $recentSurat = SuratRequest::latest()->take(5)->get();
        $recentComplaints = Complaint::latest()->take(5)->get();
        $topPosts = Post::orderByDesc('views')->take(5)->get();

        return view('admin.dashboard', compact('stats','visitorTrend','recentSurat','recentComplaints','topPosts'));
    }
}
