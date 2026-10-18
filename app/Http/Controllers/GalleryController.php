<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index() {
        $albums = GalleryAlbum::withCount('items')->latest()->get();
        return view('public.galeri.index', compact('albums'));
    }
    public function show(string $slug) {
        $album = GalleryAlbum::where('slug',$slug)->with('items')->firstOrFail();
        return view('public.galeri.show', compact('album'));
    }
}
