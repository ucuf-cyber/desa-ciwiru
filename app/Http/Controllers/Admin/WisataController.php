<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    public function index() { return view('admin.wisata.index', ['items' => Wisata::latest()->paginate(15)]); }
    public function create() { return view('admin.wisata.form', ['wisata' => new Wisata()]); }
    public function store(Request $request) { return $this->save($request, new Wisata()); }
    public function edit(Wisata $wisatum) { return view('admin.wisata.form', ['wisata' => $wisatum]); }
    public function update(Request $request, Wisata $wisatum) { return $this->save($request, $wisatum); }
    public function destroy(Wisata $wisatum) { $wisatum->delete(); return back()->with('success','Wisata dihapus.'); }

    private function save(Request $r, Wisata $w) {
        $data = $r->validate([
            'name'=>'required|string|max:150',
            'description'=>'required|string',
            'thumbnail'=>'nullable|image|max:4096',
            'lat'=>'nullable|numeric','lng'=>'nullable|numeric',
            'ticket_price'=>'nullable|numeric',
            'route'=>'nullable|string',
            'status'=>'required|in:draft,published',
        ]);
        if ($r->hasFile('thumbnail')) $data['thumbnail'] = $r->file('thumbnail')->store('wisata','public');
        $data['slug'] = $w->slug ?: Str::slug($data['name']) . '-' . Str::random(3);
        $w->fill($data)->save();
        return redirect()->route('admin.wisata.index')->with('success','Wisata disimpan.');
    }
}
