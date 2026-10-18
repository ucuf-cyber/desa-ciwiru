@extends('layouts.admin')
@section('title','Perangkat Desa')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Perangkat Desa</h1><a href="{{ route('admin.officials.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Urutan</th><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Jabatan</th><th class="px-4 py-3 text-left">Divisi</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>@foreach($items as $o)<tr class="border-b"><td class="px-4 py-3">{{ $o->sort_order }}</td><td>{{ $o->name }}</td><td>{{ $o->position }}</td><td>{{ $o->division }}</td>
    <td><a href="{{ route('admin.officials.edit',$o) }}" class="text-primary-700"><i class="fa-solid fa-pen"></i></a><form action="{{ route('admin.officials.destroy',$o) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr>@endforeach</tbody>
  </table>
</div>
@endsection
