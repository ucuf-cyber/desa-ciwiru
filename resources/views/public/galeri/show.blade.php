@extends('layouts.app')
@section('title',$album->title)
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-sm text-primary-200"><a href="{{ route('galeri.index') }}" class="hover:underline">Galeri</a></div>
    <h1 class="text-4xl mt-2">{{ $album->title }}</h1>
    <p class="text-primary-100 mt-2">{{ $album->description }}</p>
  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach($album->items as $it)
    <a href="{{ $it->file_path }}" target="_blank" class="card-hover block aspect-square rounded-xl overflow-hidden">
      <img src="{{ $it->file_path }}" alt="{{ $it->caption }}" class="w-full h-full object-cover hover:scale-110 transition">
    </a>
  @endforeach
</section>
@endsection
