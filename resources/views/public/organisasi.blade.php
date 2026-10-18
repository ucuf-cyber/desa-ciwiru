@extends('layouts.app')
@section('title','Struktur Organisasi')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Struktur Organisasi</h1><p class="text-primary-100 mt-3">Perangkat Pemerintah Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($officials as $o)
      <div class="bg-white border rounded-2xl p-6 text-center card-hover" data-aos="fade-up">
        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-primary-500 to-primary-800 grid place-items-center text-white text-3xl font-bold">{{ strtoupper(substr($o->name,0,1)) }}</div>
        <h3 class="text-lg mt-3">{{ $o->name }}</h3>
        <div class="text-primary-700 font-semibold">{{ $o->position }}</div>
        <div class="text-xs text-ink-500 mt-1">{{ $o->division }}</div>
        @if($o->bio)<p class="text-sm text-ink-500 mt-3">{{ $o->bio }}</p>@endif
      </div>
    @endforeach
  </div>
</section>
@endsection
