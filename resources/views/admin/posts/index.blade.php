@extends('layouts.admin')
@section('title','Kelola Berita')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Berita</h1><a href="{{ route('admin.posts.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah Berita</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Judul</th><th class="px-4 py-3 text-left">Kategori</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3 text-left">Tanggal</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>
      @foreach($posts as $p)
        <tr class="border-b"><td class="px-4 py-3 max-w-xs"><div class="font-semibold line-clamp-1">{{ $p->title }}</div><div class="text-xs text-slate-500">{{ $p->views }}x dilihat</div></td>
        <td class="px-4 py-3">{{ $p->category->name ?? '-' }}</td>
        <td class="px-4 py-3"><span class="text-xs px-2 py-1 rounded {{ $p->status==='published'?'bg-emerald-100 text-emerald-700':'bg-amber-100 text-amber-700' }}">{{ $p->status }}</span></td>
        <td class="px-4 py-3 text-xs">{{ $p->published_at?->format('d M Y') }}</td>
        <td class="px-4 py-3"><a href="{{ route('admin.posts.edit',$p) }}" class="text-primary-700"><i class="fa-solid fa-pen"></i></a>
        <form action="{{ route('admin.posts.destroy',$p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $posts->links() }}</div>
@endsection
