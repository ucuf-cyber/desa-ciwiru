<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function index() { return view('admin.officials.index', ['items' => Official::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.officials.form', ['row' => new Official()]); }
    public function store(Request $r) { return $this->save($r, new Official()); }
    public function edit(Official $official) { return view('admin.officials.form', ['row' => $official]); }
    public function update(Request $r, Official $official) { return $this->save($r, $official); }
    public function destroy(Official $official) { $official->delete(); return back()->with('success','Perangkat dihapus.'); }

    private function save(Request $r, Official $o) {
        $data = $r->validate([
            'name'=>'required|string|max:120','position'=>'required|string|max:120',
            'division'=>'nullable|string|max:120','photo'=>'nullable|image|max:4096',
            'bio'=>'nullable|string|max:2000','sort_order'=>'required|integer',
            'period_start'=>'nullable|date','period_end'=>'nullable|date',
        ]);
        if ($r->hasFile('photo')) $data['photo'] = $r->file('photo')->store('officials','public');
        $o->fill($data)->save();
        return redirect()->route('admin.officials.index')->with('success','Perangkat desa disimpan.');
    }
}
