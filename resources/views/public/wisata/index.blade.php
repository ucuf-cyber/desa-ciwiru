@extends('layouts.app')
@section('title','Wisata Desa')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Wisata Desa Ciwiru</h1><p class="text-primary-100 mt-3">Eksplorasi pesona alam kaki Gunung Ciremai</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach($wisata as $w)
    <a href="{{ route('wisata.show', $w->slug) }}" class="card-hover bg-white rounded-2xl overflow-hidden shadow block" data-aos="fade-up">
      <div class="aspect-video bg-slate-100" style="background-image:url('{{ $w->thumbnail }}'); background-size:cover; background-position:center;"></div>
      <div class="p-5">
        <h3 class="text-xl">{{ $w->name }}</h3>
        <p class="text-sm text-ink-500 mt-2 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($w->description), 150) }}</p>
        <div class="mt-4 flex justify-between text-sm">
          <span class="text-primary-700 font-semibold"><i class="fa-solid fa-ticket mr-1"></i>Rp {{ number_format($w->ticket_price,0,',','.') }}</span>
          <span class="text-amber-600 font-semibold">Detail <i class="fa-solid fa-arrow-right ml-1"></i></span>
        </div>
      </div>
    </a>
  @endforeach
</section>
<div class="max-w-7xl mx-auto px-4">{{ $wisata->links() }}</div>
@endsection
