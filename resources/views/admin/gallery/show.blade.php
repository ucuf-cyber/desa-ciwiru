@extends('layouts.admin')
@section('title',$album->title)
@section('content')
<h1 class="text-2xl mb-2">{{ $album->title }}</h1>
<p class="text-slate-500 mb-6">{{ $album->description }}</p>
<form action="{{ route('admin.gallery.items',$album) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow mb-6">@csrf
  <label class="font-semibold block mb-2">Tambah Foto</label>
  <input type="file" name="items[]" multiple class="border rounded-lg px-3 py-2 bg-white">
  <button class="ml-2 bg-emerald-600 text-white px-4 py-2 rounded-lg">Upload</button>
</form>
<div class="grid sm:grid-cols-4 gap-4">
  @foreach($album->items as $it)
    <div class="bg-white rounded-xl overflow-hidden shadow">
      <div class="aspect-square" style="background-image:url('{{ $it->file_path }}'); background-size:cover; background-position:center;"></div>
      <form action="{{ route('admin.gallery.items.destroy',$it) }}" method="POST" class="p-2" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600 text-sm w-full">Hapus</button></form>
    </div>
  @endforeach
</div>
@endsection
