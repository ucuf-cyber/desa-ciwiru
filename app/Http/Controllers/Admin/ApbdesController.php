<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apbdes;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    public function index() { return view('admin.apbdes.index', ['items' => Apbdes::orderByDesc('year')->paginate(20)]); }
    public function create() { return view('admin.apbdes.form', ['row' => new Apbdes()]); }
    public function store(Request $r) { return $this->save($r, new Apbdes()); }
    public function edit(Apbdes $apbde) { return view('admin.apbdes.form', ['row' => $apbde]); }
    public function update(Request $r, Apbdes $apbde) { return $this->save($r, $apbde); }
    public function destroy(Apbdes $apbde) { $apbde->delete(); return back()->with('success','Data APBDes dihapus.'); }

    private function save(Request $r, Apbdes $a) {
        $data = $r->validate([
            'year' => 'required|integer','type' => 'required|in:pendapatan,belanja,pembiayaan',
            'category' => 'required|string|max:150','description' => 'required|string|max:500',
            'planned' => 'required|numeric','realized' => 'required|numeric',
            'quarter' => 'required|in:Q1,Q2,Q3,Q4,TAHUNAN',
        ]);
        $a->fill($data)->save();
        return redirect()->route('admin.apbdes.index')->with('success','Data APBDes disimpan.');
    }
}
