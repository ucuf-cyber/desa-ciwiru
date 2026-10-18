@extends('layouts.admin')
@section('title','Form Berita')
@section('content')
@php $isEdit = $post->exists; @endphp
<h1 class="text-2xl mb-6">{{ $isEdit ? 'Edit' : 'Tambah' }} Berita</h1>
<form action="{{ $isEdit ? route('admin.posts.update',$post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf
  @if($isEdit) @method('PUT') @endif
  <div><label class="font-semibold">Judul</label><input type="text" name="title" value="{{ old('title',$post->title) }}" required class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Kategori</label><select name="category_id" class="w-full border rounded-lg px-3 py-2 mt-1"><option value="">-</option>@foreach($categories as $c)<option value="{{ $c->id }}" {{ $post->category_id==$c->id?'selected':'' }}>{{ $c->name }}</option>@endforeach</select></div>
    <div><label class="font-semibold">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['draft','published','archived'] as $s)<option value="{{ $s }}" {{ ($post->status ?? 'draft')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
  </div>
  <div><label class="font-semibold">Thumbnail</label><input type="file" name="thumbnail" class="w-full border rounded-lg px-3 py-2 mt-1 bg-white">@if($post->thumbnail)<div class="mt-2 text-xs text-slate-500">File saat ini: {{ $post->thumbnail }}</div>@endif</div>
  <div><label class="font-semibold">Ringkasan</label><textarea name="excerpt" rows="2" class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('excerpt',$post->excerpt) }}</textarea></div>
  <div><label class="font-semibold">Isi Berita</label><textarea name="body" id="editor-body" rows="14" class="w-full border rounded-lg px-3 py-2 mt-1">{{ old('body',$post->body) }}</textarea></div>
  <div class="grid sm:grid-cols-2 gap-4">
    <div><label class="font-semibold">Tags</label><input type="text" name="tags" value="{{ old('tags',$post->tags) }}" class="w-full border rounded-lg px-3 py-2 mt-1" placeholder="ciwiru, desa, pertanian"></div>
    <div><label class="font-semibold">Tanggal Publish</label><input type="datetime-local" name="published_at" value="{{ $post->published_at?->format('Y-m-d\TH:i') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  </div>
  <div class="flex gap-2"><button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan</button><a href="{{ route('admin.posts.index') }}" class="bg-slate-200 hover:bg-slate-300 px-6 py-2 rounded-lg transition">Batal</a></div>
</form>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor-body'), {
    toolbar: ['heading','|','bold','italic','link','bulletedList','numberedList','|','outdent','indent','|','blockQuote','insertTable','undo','redo']
  }).catch(console.error);
</script>
@endpush
@endsection
