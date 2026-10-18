<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index() { return view('admin.gallery.index', ['albums' => GalleryAlbum::withCount('items')->latest()->get()]); }
    public function create() { return view('admin.gallery.form', ['album' => new GalleryAlbum()]); }
    public function store(Request $r) {
        $data = $r->validate(['title'=>'required|string|max:120','description'=>'nullable|string','cover'=>'nullable|image|max:4096']);
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(3);
        if ($r->hasFile('cover')) $data['cover'] = $r->file('cover')->store('gallery','public');
        GalleryAlbum::create($data);
        return redirect()->route('admin.gallery.index')->with('success','Album dibuat.');
    }
    public function show(GalleryAlbum $album) {
        return view('admin.gallery.show', ['album' => $album->load('items')]);
    }
    public function addItems(Request $r, GalleryAlbum $album) {
        $r->validate(['items.*'=>'required|image|max:4096']);
        foreach ((array) $r->file('items') as $i => $f) {
            GalleryItem::create([
                'album_id'=>$album->id,'type'=>'image',
                'file_path'=>$f->store('gallery','public'),
                'caption'=>$album->title.' '.($album->items()->count()+$i+1),
                'sort_order'=>$album->items()->count()+$i,
            ]);
        }
        return back()->with('success','Foto ditambahkan.');
    }
    public function destroy(GalleryAlbum $album) { $album->delete(); return back()->with('success','Album dihapus.'); }
    public function destroyItem(GalleryItem $item) { $item->delete(); return back()->with('success','Foto dihapus.'); }
}
