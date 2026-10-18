@extends('layouts.admin')
@section('title','APBDes')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">APBDes</h1><a href="{{ route('admin.apbdes.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Tahun</th><th class="px-4 py-3 text-left">Jenis</th><th class="px-4 py-3 text-left">Kategori</th><th class="px-4 py-3 text-right">Anggaran</th><th class="px-4 py-3 text-right">Realisasi</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>@foreach($items as $a)<tr class="border-b"><td class="px-4 py-3">{{ $a->year }}</td><td class="capitalize">{{ $a->type }}</td><td>{{ $a->category }}</td><td class="text-right">Rp {{ number_format($a->planned,0,',','.') }}</td><td class="text-right">Rp {{ number_format($a->realized,0,',','.') }}</td>
    <td><a href="{{ route('admin.apbdes.edit',$a) }}" class="text-primary-700"><i class="fa-solid fa-pen"></i></a><form action="{{ route('admin.apbdes.destroy',$a) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr>@endforeach</tbody>
  </table>
</div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
