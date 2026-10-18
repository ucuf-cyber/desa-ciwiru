@extends('layouts.app')
@section('title',$wisata->name)
@section('content')
<section class="relative h-[400px]">
  <img src="{{ $wisata->thumbnail }}" class="absolute inset-0 w-full h-full object-cover">
  <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-black/30"></div>
  <div class="absolute bottom-0 max-w-7xl mx-auto inset-x-0 px-4 pb-8 text-white">
    <div class="text-sm text-primary-200"><a href="{{ route('wisata.index') }}" class="hover:underline">Wisata</a></div>
    <h1 class="text-4xl sm:text-5xl mt-2">{{ $wisata->name }}</h1>
    <div class="mt-2 flex gap-4 text-sm"><span><i class="fa-solid fa-ticket mr-1"></i>Rp {{ number_format($wisata->ticket_price,0,',','.') }}</span></div>
  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2">
    <h2 class="text-2xl mb-3">Deskripsi</h2>
    <div class="prose-content text-ink-700">{!! nl2br(e($wisata->description)) !!}</div>
    @if($wisata->route)
      <h2 class="text-2xl mt-8 mb-3">Rute Menuju Lokasi</h2>
      <p class="text-ink-700">{{ $wisata->route }}</p>
    @endif
    @if(!empty($wisata->facilities))
      <h2 class="text-2xl mt-8 mb-3">Fasilitas</h2>
      <div class="flex flex-wrap gap-2">
        @foreach($wisata->facilities as $f)<span class="bg-primary-100 text-primary-700 text-sm px-3 py-1 rounded-full">{{ $f }}</span>@endforeach
      </div>
    @endif
  </div>
  <aside class="space-y-6">
    @if(!empty($wisata->open_hours))
      <div class="bg-white border rounded-2xl p-5">
        <h3 class="font-bold mb-3"><i class="fa-regular fa-clock mr-2 text-primary-600"></i>Jam Buka</h3>
        <ul class="text-sm space-y-1">
          @foreach($wisata->open_hours as $hari => $jam)
            <li class="flex justify-between border-b py-1"><span class="capitalize">{{ $hari }}</span><span>{{ $jam }}</span></li>
          @endforeach
        </ul>
      </div>
    @endif
    @if($wisata->lat && $wisata->lng)
      <div id="map" class="h-64 rounded-2xl overflow-hidden shadow"></div>
    @endif
  </aside>
</section>

@if($related->count())
<section class="max-w-7xl mx-auto px-4 pb-16">
  <h3 class="text-2xl mb-6">Wisata Lainnya</h3>
  <div class="grid sm:grid-cols-3 gap-6">
    @foreach($related as $r)
      <a href="{{ route('wisata.show', $r->slug) }}" class="card-hover relative h-48 rounded-xl overflow-hidden block">
        <img src="{{ $r->thumbnail }}" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
        <div class="absolute bottom-0 p-4 text-white"><h4 class="font-bold">{{ $r->name }}</h4></div>
      </a>
    @endforeach
  </div>
</section>
@endif

@if($wisata->lat && $wisata->lng)
@push('scripts')
<script>
  const map = L.map('map').setView([{{ $wisata->lat }},{{ $wisata->lng }}],15);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
  L.marker([{{ $wisata->lat }},{{ $wisata->lng }}]).addTo(map).bindPopup('{{ $wisata->name }}').openPopup();
</script>
@endpush
@endif
@endsection
