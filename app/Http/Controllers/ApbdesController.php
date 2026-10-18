<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;

class ApbdesController extends Controller
{
    public function index() {
        $years = Apbdes::select('year')->distinct()->orderByDesc('year')->pluck('year');
        $currentYear = request('tahun', $years->first() ?? now()->year);

        $rows = Apbdes::where('year', $currentYear)->orderBy('type')->orderBy('category')->get();
        $summary = [
            'pendapatan' => $rows->where('type','pendapatan')->sum('planned'),
            'belanja' => $rows->where('type','belanja')->sum('planned'),
            'pembiayaan' => $rows->where('type','pembiayaan')->sum('planned'),
            'realisasi_pendapatan' => $rows->where('type','pendapatan')->sum('realized'),
            'realisasi_belanja' => $rows->where('type','belanja')->sum('realized'),
        ];

        return view('public.apbdes', compact('rows','summary','years','currentYear'));
    }
}
