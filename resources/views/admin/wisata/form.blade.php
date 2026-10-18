@extends('layouts.admin')
@section('title','Form Wisata')
@section('content')
@php $edit = $wisata->exists; @endphp
<h1 class="text-2xl mb-6">{{ $edit?'Edit':'Tambah' }} Wisata</h1>
<form action="{{ $edit?route('admin.wisata.update',$wisata):route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @if($edit)@method('PUT')@endif
  <div><label class="font-semibold">Nama</label><input type="text" name="name" value="{{ old('name',$wisata->name) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Deskripsi</label><textarea name="description" id="editor-desc" rows="6" required class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('description',$wisata->description) }}</textarea></div>
  <div class="grid sm:grid-cols-3 gap-4">
    <div><label class="font-semibold">Latitude</label><input type="text" name="lat" value="{{ old('lat',$wisata->lat) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Longitude</label><input type="text" name="lng" value="{{ old('lng',$wisata->lng) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Harga Tiket</label><input type="number" name="ticket_price" value="{{ old('ticket_price',$wisata->ticket_price ?? 0) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div><label class="font-semibold">Rute</label><textarea name="route" rows="2" class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('route',$wisata->route) }}</textarea></div>
  <div><label class="font-semibold">Thumbnail</label><input type="file" name="thumbnail" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white"></div>
  <div><label class="font-semibold">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1"><option value="published" {{ ($wisata->status??'published')==='published'?'selected':'' }}>Published</option><option value="draft" {{ $wisata->status==='draft'?'selected':'' }}>Draft</option></select></div>
  <div class="flex gap-2"><button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan</button><a href="{{ route('admin.wisata.index') }}" class="bg-slate-200 px-6 py-2 rounded-lg">Batal</a></div>
</form>
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.querySelector('#editor-desc')).catch(console.error);</script>
@endpush
@endsection
