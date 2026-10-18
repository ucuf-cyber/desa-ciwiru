@extends('layouts.app')
@section('title','Demografis Desa')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Data Demografis Desa</h1><p class="text-primary-100 mt-3">Komposisi penduduk Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
    @foreach([
      ['Total Penduduk', $stats['total'].' Jiwa','fa-users','primary'],
      ['Laki-laki', $stats['laki'].' Jiwa','fa-mars','secondary'],
      ['Perempuan', $stats['perempuan'].' Jiwa','fa-venus','primary'],
      ['Kepala Keluarga', $stats['kk'].' KK','fa-house','secondary'],
    ] as $c)
      <div class="bg-white shadow rounded-2xl p-6">
        <i class="fa-solid {{ $c[2] }} text-2xl {{ $c[3]==='primary'?'text-primary-600':'text-amber-600' }}"></i>
        <div class="text-3xl font-bold mt-3">{{ $c[1] }}</div>
        <div class="text-sm text-ink-500">{{ $c[0] }}</div>
      </div>
    @endforeach
  </div>
  <p class="text-ink-700">Data demografis berikut diolah berdasarkan catatan administrasi kependudukan Pemerintah Desa Ciwiru tahun terkini. Untuk grafik dan rincian lebih lanjut, kunjungi halaman <a href="{{ route('statistik') }}" class="text-primary-600 underline">Statistik Desa</a>.</p>
</section>
@endsection
