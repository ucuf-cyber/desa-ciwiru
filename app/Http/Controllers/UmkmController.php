<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request) {
        $q = Umkm::with('products')->where('status','published');
        if ($cat = $request->get('kategori')) $q->where('category', $cat);
        if ($s = $request->get('q')) $q->where('name','like',"%$s%");
        $umkm = $q->latest()->paginate(9)->withQueryString();
        $categories = Umkm::where('status','published')->select('category')->distinct()->pluck('category');
        return view('public.umkm.index', compact('umkm','categories'));
    }
    public function show(string $slug) {
        $umkm = Umkm::with('products')->where('slug',$slug)->firstOrFail();
        return view('public.umkm.show', compact('umkm'));
    }
}
