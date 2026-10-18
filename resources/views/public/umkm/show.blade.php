@extends('layouts.app')
@section('title',$umkm->name)
@section('content')
<section class="gradient-hero text-white py-12">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-sm text-primary-200"><a href="{{ route('umkm.index') }}" class="hover:underline">UMKM</a></div>
    <h1 class="text-4xl mt-2">{{ $umkm->name }}</h1>
    <div class="mt-2 flex gap-4 text-sm"><span><i class="fa-solid fa-user mr-1"></i>{{ $umkm->owner }}</span><span><i class="fa-solid fa-location-dot mr-1"></i>{{ $umkm->address }}</span></div>
  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2">
    <div class="aspect-video rounded-2xl overflow-hidden bg-slate-100 mb-6" style="background-image:url('{{ $umkm->thumbnail }}'); background-size:cover; background-position:center;"></div>
    <h2 class="text-2xl mb-3">Tentang Usaha</h2>
    <p class="text-ink-700 mb-8">{{ $umkm->description }}</p>
    <h2 class="text-2xl mb-4">Produk</h2>
    <div class="grid sm:grid-cols-2 gap-4">
      @foreach($umkm->products as $p)
        <div class="bg-white border rounded-xl overflow-hidden card-hover">
          <div class="aspect-video bg-slate-100" style="background-image:url('{{ $p->photo }}'); background-size:cover; background-position:center;"></div>
          <div class="p-4">
            <h4 class="font-bold">{{ $p->name }}</h4>
            <div class="text-primary-700 font-semibold mt-1">Rp {{ number_format($p->price,0,',','.') }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <aside>
    <div class="bg-white border rounded-2xl p-5 sticky top-24">
      <h3 class="font-bold mb-3">Hubungi Penjual</h3>
      @if($umkm->whatsapp)
        <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank" class="block bg-green-500 hover:bg-green-600 text-white text-center px-4 py-3 rounded-xl font-semibold"><i class="fa-brands fa-whatsapp mr-2"></i>Chat WhatsApp</a>
      @endif
      <div class="mt-5 text-sm space-y-2">
        <div><i class="fa-solid fa-location-dot text-primary-600 mr-2"></i>{{ $umkm->address }}</div>
        <div><i class="fa-solid fa-tag text-primary-600 mr-2"></i>{{ $umkm->category }}</div>
      </div>
    </div>
  </aside>
</section>
@endsection
