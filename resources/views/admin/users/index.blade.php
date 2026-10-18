@extends('layouts.admin')
@section('title','Pengguna')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Pengguna</h1><a href="{{ route('admin.users.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Email</th><th class="px-4 py-3 text-left">Role</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>@foreach($users as $u)<tr class="border-b"><td class="px-4 py-3">{{ $u->name }}</td><td>{{ $u->email }}</td><td><span class="text-xs px-2 py-1 rounded bg-slate-100">{{ str_replace('_',' ',$u->role) }}</span></td>
    <td>@if($u->is_active)<span class="text-primary-700">Aktif</span>@else<span class="text-red-600">Nonaktif</span>@endif</td>
    <td><a href="{{ route('admin.users.edit',$u) }}" class="text-primary-700"><i class="fa-solid fa-pen"></i></a><form action="{{ route('admin.users.destroy',$u) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr>@endforeach</tbody>
  </table>
</div>
<div class="mt-4">{{ $users->links() }}</div>
@endsection
