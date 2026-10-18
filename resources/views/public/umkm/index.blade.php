@extends('layouts.app')
@section('title','UMKM')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Direktori UMKM</h1><p class="text-primary-100 mt-3">Dukung produk lokal warga Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <form method="GET" class="bg-white rounded-xl shadow p-4 flex flex-wrap gap-3 mb-8">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari UMKM..." class="flex-1 min-w-[200px] border rounded-lg px-3 py-2">
    <select name="kategori" class="border rounded-lg px-3 py-2">
      <option value="">Semua Kategori</option>
      @foreach($categories as $c)<option value="{{ $c }}" {{ request('kategori')==$c?'selected':'' }}>{{ $c }}</option>@endforeach
    </select>
    <button class="bg-primary-600 text-white px-5 rounded-lg">Cari</button>
  </form>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($umkm as $u)
      <div class="card-hover bg-white rounded-2xl overflow-hidden shadow border" data-aos="fade-up">
        <a href="{{ route('umkm.show', $u->slug) }}">
          <div class="aspect-square bg-slate-100" style="background-image:url('{{ $u->thumbnail }}'); background-size:cover; background-position:center;"></div>
        </a>
        <div class="p-5">
          <span class="text-xs bg-amber-100 text-amber-800 px-2 py-1 rounded font-semibold">{{ $u->category }}</span>
          <h3 class="text-lg mt-2">{{ $u->name }}</h3>
          <p class="text-xs text-ink-500 mt-1"><i class="fa-solid fa-user mr-1"></i>{{ $u->owner }}</p>
          <p class="text-sm text-ink-700 mt-2 line-clamp-2">{{ \Illuminate\Support\Str::limit($u->description, 100) }}</p>
          <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('umkm.show', $u->slug) }}" class="text-primary-600 font-semibold text-sm">Detail</a>
            @if($u->whatsapp)
              <a href="https://wa.me/{{ $u->whatsapp }}" target="_blank" class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-sm"><i class="fa-brands fa-whatsapp mr-1"></i>Pesan</a>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-3 text-ink-500">Belum ada UMKM.</div>
    @endforelse
  </div>
  <div class="mt-8">{{ $umkm->links() }}</div>
</section>
@endsection
