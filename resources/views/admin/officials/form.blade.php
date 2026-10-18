@extends('layouts.admin')
@section('title','Form Perangkat')
@section('content')
@php $edit = $row->exists; @endphp
<h1 class="text-2xl mb-6">{{ $edit?'Edit':'Tambah' }} Perangkat Desa</h1>
<form action="{{ $edit?route('admin.officials.update',$row):route('admin.officials.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @if($edit)@method('PUT')@endif
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Nama</label><input type="text" name="name" value="{{ old('name',$row->name) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Jabatan</label><input type="text" name="position" value="{{ old('position',$row->position) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Divisi</label><input type="text" name="division" value="{{ old('division',$row->division) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Urutan</label><input type="number" name="sort_order" value="{{ old('sort_order',$row->sort_order ?? 1) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Periode Awal</label><input type="date" name="period_start" value="{{ $row->period_start?->format('Y-m-d') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Periode Akhir</label><input type="date" name="period_end" value="{{ $row->period_end?->format('Y-m-d') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div><label class="font-semibold">Foto</label><input type="file" name="photo" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white"></div>
  <div><label class="font-semibold">Bio</label><textarea name="bio" rows="3" class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('bio',$row->bio) }}</textarea></div>
  <div class="flex gap-2"><button class="bg-emerald-600 text-white px-6 py-2 rounded-lg">Simpan</button><a href="{{ route('admin.officials.index') }}" class="bg-slate-200 px-6 py-2 rounded-lg">Batal</a></div>
</form>
@endsection
