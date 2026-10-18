@extends('layouts.admin')
@section('title','Galeri')
@section('content')
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Galeri</h1><a href="{{ route('admin.gallery.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Album Baru</a></div>
<div class="grid sm:grid-cols-3 gap-6">
  @foreach($albums as $a)
    <div class="bg-white rounded-2xl shadow overflow-hidden">
      <div class="aspect-video bg-slate-200" style="background-image:url('{{ $a->cover }}'); background-size:cover; background-position:center;"></div>
      <div class="p-4">
        <h3 class="font-bold">{{ $a->title }}</h3>
        <div class="text-xs text-slate-500">{{ $a->items_count }} foto</div>
        <div class="mt-3 flex gap-2">
          <a href="{{ route('admin.gallery.show',$a) }}" class="text-primary-700 text-sm">Kelola Foto</a>
          <form action="{{ route('admin.gallery.destroy',$a) }}" method="POST" onsubmit="return confirm('Hapus album?')">@csrf @method('DELETE')<button class="text-red-600 text-sm">Hapus</button></form>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
