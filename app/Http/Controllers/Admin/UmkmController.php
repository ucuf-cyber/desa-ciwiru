<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    public function index() { return view('admin.umkm.index', ['items' => Umkm::latest()->paginate(15)]); }
    public function create() { return view('admin.umkm.form', ['umkm' => new Umkm()]); }
    public function store(Request $r) { return $this->save($r, new Umkm()); }
    public function edit(Umkm $umkm) { return view('admin.umkm.form', compact('umkm')); }
    public function update(Request $r, Umkm $umkm) { return $this->save($r, $umkm); }
    public function destroy(Umkm $umkm) { $umkm->delete(); return back()->with('success','UMKM dihapus.'); }

    private function save(Request $r, Umkm $u) {
        $data = $r->validate([
            'name'=>'required|string|max:150','owner'=>'required|string|max:100',
            'category'=>'required|string|max:80','description'=>'required|string',
            'thumbnail'=>'nullable|image|max:4096','address'=>'nullable|string|max:200',
            'whatsapp'=>'nullable|string|max:20','lat'=>'nullable|numeric','lng'=>'nullable|numeric',
            'status'=>'required|in:draft,published',
        ]);
        if ($r->hasFile('thumbnail')) $data['thumbnail'] = $r->file('thumbnail')->store('umkm','public');
        $data['slug'] = $u->slug ?: Str::slug($data['name']) . '-' . Str::random(3);
        $u->fill($data)->save();
        return redirect()->route('admin.umkm.index')->with('success','UMKM disimpan.');
    }
}
