<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class WisataController extends Controller
{
    public function index() {
        $wisata = Wisata::where('status','published')->latest()->paginate(9);
        return view('public.wisata.index', compact('wisata'));
    }
    public function show(string $slug) {
        $wisata = Wisata::where('slug',$slug)->firstOrFail();
        $related = Wisata::where('status','published')->where('id','!=',$wisata->id)->take(3)->get();
        return view('public.wisata.show', compact('wisata','related'));
    }
}
