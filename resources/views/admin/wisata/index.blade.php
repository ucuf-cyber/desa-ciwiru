@extends('layouts.admin')
@section('title','Kelola Wisata')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Wisata</h1><a href="{{ route('admin.wisata.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Tiket</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>@foreach($items as $w)<tr class="border-b"><td class="px-4 py-3">{{ $w->name }}</td><td>Rp {{ number_format($w->ticket_price,0,',','.') }}</td><td><span class="text-xs px-2 py-1 rounded bg-emerald-100 text-emerald-700">{{ $w->status }}</span></td>
    <td><a href="{{ route('admin.wisata.edit',$w) }}" class="text-primary-700"><i class="fa-solid fa-pen"></i></a>
    <form action="{{ route('admin.wisata.destroy',$w) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr>@endforeach</tbody>
  </table>
</div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
