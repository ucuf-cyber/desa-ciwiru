@extends('layouts.admin')
@section('title','Form APBDes')
@section('content')
@php $edit = $row->exists; @endphp
<h1 class="text-2xl mb-6">{{ $edit?'Edit':'Tambah' }} Data APBDes</h1>
<form action="{{ $edit?route('admin.apbdes.update',$row):route('admin.apbdes.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @if($edit)@method('PUT')@endif
  <div class="grid sm:grid-cols-3 gap-4">
    <div><label class="font-semibold">Tahun</label><input type="number" name="year" value="{{ old('year',$row->year ?? now()->year) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Jenis</label><select name="type" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['pendapatan','belanja','pembiayaan'] as $t)<option value="{{ $t }}" {{ $row->type===$t?'selected':'' }}>{{ ucfirst($t) }}</option>@endforeach</select></div>
    <div><label class="font-semibold">Periode</label><select name="quarter" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['TAHUNAN','Q1','Q2','Q3','Q4'] as $q)<option value="{{ $q }}" {{ ($row->quarter ?? 'TAHUNAN')===$q?'selected':'' }}>{{ $q }}</option>@endforeach</select></div>
  </div>
  <div><label class="font-semibold">Kategori</label><input type="text" name="category" value="{{ old('category',$row->category) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Deskripsi</label><textarea name="description" rows="3" required class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('description',$row->description) }}</textarea></div>
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Anggaran (Rp)</label><input type="number" step="0.01" name="planned" value="{{ old('planned',$row->planned ?? 0) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Realisasi (Rp)</label><input type="number" step="0.01" name="realized" value="{{ old('realized',$row->realized ?? 0) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div class="flex gap-2"><button class="bg-emerald-600 text-white px-6 py-2 rounded-lg">Simpan</button><a href="{{ route('admin.apbdes.index') }}" class="bg-slate-200 px-6 py-2 rounded-lg">Batal</a></div>
</form>
@endsection
