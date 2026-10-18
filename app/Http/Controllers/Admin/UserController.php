<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() { return view('admin.users.index', ['users' => User::latest()->paginate(15)]); }
    public function create() { return view('admin.users.form', ['user' => new User()]); }
    public function store(Request $r) {
        $data = $r->validate([
            'name'=>'required|string|max:120','email'=>'required|email|unique:users',
            'password'=>'required|min:6','role'=>'required|in:super_admin,admin,operator,kepala_desa,masyarakat',
            'phone'=>'nullable|string|max:20','is_active'=>'nullable',
        ]);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index')->with('success','Pengguna dibuat.');
    }
    public function edit(User $user) { return view('admin.users.form', compact('user')); }
    public function update(Request $r, User $user) {
        $data = $r->validate([
            'name'=>'required|string|max:120','email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|min:6','role'=>'required|in:super_admin,admin,operator,kepala_desa,masyarakat',
            'phone'=>'nullable|string|max:20','is_active'=>'nullable',
        ]);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        if (!empty($data['password'])) $data['password'] = Hash::make($data['password']); else unset($data['password']);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success','Pengguna diperbarui.');
    }
    public function destroy(User $user) {
        if ($user->id === auth()->id()) return back()->with('error','Tidak dapat menghapus akun sendiri.');
        $user->delete();
        return back()->with('success','Pengguna dihapus.');
    }
}
