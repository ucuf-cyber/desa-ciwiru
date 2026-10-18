@extends('layouts.admin')
@section('title','Form UMKM')
@section('content')
@php $edit = $umkm->exists; @endphp
<h1 class="text-2xl mb-6">{{ $edit?'Edit':'Tambah' }} UMKM</h1>
<form action="{{ $edit?route('admin.umkm.update',$umkm):route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @if($edit)@method('PUT')@endif
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Nama UMKM</label><input type="text" name="name" value="{{ old('name',$umkm->name) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Pemilik</label><input type="text" name="owner" value="{{ old('owner',$umkm->owner) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">Kategori</label><input type="text" name="category" value="{{ old('category',$umkm->category) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="font-semibold">WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp',$umkm->whatsapp) }}" placeholder="6282xxxxx" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div><label class="font-semibold">Alamat</label><input type="text" name="address" value="{{ old('address',$umkm->address) }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Deskripsi</label><textarea name="description" id="editor-umkm" rows="5" required class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('description',$umkm->description) }}</textarea></div>
  <div><label class="font-semibold">Thumbnail</label><input type="file" name="thumbnail" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white"></div>
  <div><label class="font-semibold">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1"><option value="published" {{ ($umkm->status??'published')==='published'?'selected':'' }}>Published</option><option value="draft" {{ $umkm->status==='draft'?'selected':'' }}>Draft</option></select></div>
  <div class="flex gap-2"><button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan</button><a href="{{ route('admin.umkm.index') }}" class="bg-slate-200 px-6 py-2 rounded-lg">Batal</a></div>
</form>
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.querySelector('#editor-umkm')).catch(console.error);</script>
@endpush
@endsection
