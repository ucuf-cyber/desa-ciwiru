@extends('layouts.app')
@section('title','Kontak')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Hubungi Kami</h1><p class="text-primary-100 mt-3">Kantor Pemerintah Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid lg:grid-cols-2 gap-8">
  <div>
    <h2 class="text-2xl mb-4">Informasi Kontak</h2>
    <ul class="space-y-4 text-ink-700">
      <li class="flex gap-3"><i class="fa-solid fa-location-dot text-primary-600 text-xl mt-1"></i><span>{{ $siteAddress }}</span></li>
      <li class="flex gap-3"><i class="fa-solid fa-phone text-primary-600 text-xl mt-1"></i><span>{{ $sitePhone }}</span></li>
      <li class="flex gap-3"><i class="fa-solid fa-envelope text-primary-600 text-xl mt-1"></i><span>{{ $siteEmail }}</span></li>
      <li class="flex gap-3"><i class="fa-solid fa-clock text-primary-600 text-xl mt-1"></i><span>Senin - Kamis: 08.00 - 15.00<br>Jumat: 08.00 - 11.00</span></li>
    </ul>
    <div id="map-kontak" class="h-64 rounded-2xl mt-6 overflow-hidden shadow"></div>
  </div>
  <div>
    <h2 class="text-2xl mb-4">Kirim Pesan</h2>
    <form action="{{ route('kontak.send') }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf
      <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="font-semibold">Nama</label><input type="text" name="name" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
        <div><label class="font-semibold">Email</label><input type="email" name="email" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      </div>
      <div><label class="font-semibold">Subjek</label><input type="text" name="subject" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      <div><label class="font-semibold">Pesan</label><textarea name="message" rows="5" required class="mt-1 w-full border rounded-lg px-3 py-2"></textarea></div>
      <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-semibold">Kirim Pesan</button>
    </form>
  </div>
</section>
@push('scripts')
<script>
  const m=L.map('map-kontak').setView([-6.7961,108.4411],14);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(m);
  L.marker([-6.7961,108.4411]).addTo(m).bindPopup('Kantor Desa Ciwiru').openPopup();
</script>
@endpush
@endsection
