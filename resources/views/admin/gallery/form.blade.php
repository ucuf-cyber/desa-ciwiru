@extends('layouts.admin')
@section('title','Album Baru')
@section('content')
<h1 class="text-2xl mb-6">Buat Album Baru</h1>
<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf
  <div><label class="font-semibold">Judul Album</label><input type="text" name="title" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Deskripsi</label><textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2 mt-1"></textarea></div>
  <div><label class="font-semibold">Cover</label><input type="file" name="cover" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white"></div>
  <button class="bg-emerald-600 text-white px-6 py-2 rounded-lg">Buat Album</button>
</form>
@endsection
