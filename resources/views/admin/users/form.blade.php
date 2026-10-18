@extends('layouts.admin')
@section('title','Form Pengguna')
@section('content')
@php $edit = $user->exists; @endphp
<h1 class="text-2xl mb-6">{{ $edit?'Edit':'Tambah' }} Pengguna</h1>
<form action="{{ $edit?route('admin.users.update',$user):route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @if($edit)@method('PUT')@endif
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Nama</label><input type="text" name="name" value="{{ old('name',$user->name) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Email</label><input type="email" name="email" value="{{ old('email',$user->email) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Password {{ $edit?'(Kosongkan jika tidak diubah)':'' }}</label><input type="password" name="password" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Role</label><select name="role" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['super_admin','admin','operator','kepala_desa','masyarakat'] as $r)<option value="{{ $r }}" {{ ($user->role ?? 'masyarakat')===$r?'selected':'' }}>{{ str_replace('_',' ',$r) }}</option>@endforeach</select></div>
    <div><label class="font-semibold">No HP</label><input type="text" name="phone" value="{{ old('phone',$user->phone) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div class="flex items-center"><label class="flex items-center gap-2 mt-7"><input type="checkbox" name="is_active" value="1" {{ ($user->is_active ?? true)?'checked':'' }}> Aktif</label></div>
  </div>
  <div class="flex gap-2"><button class="bg-emerald-600 text-white px-6 py-2 rounded-lg">Simpan</button><a href="{{ route('admin.users.index') }}" class="bg-slate-200 px-6 py-2 rounded-lg">Batal</a></div>
</form>
@endsection
