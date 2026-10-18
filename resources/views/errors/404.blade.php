@extends('layouts.app')
@section('title','Halaman Tidak Ditemukan')
@section('content')
<section class="min-h-[60vh] grid place-items-center px-4 py-16">
  <div class="text-center max-w-md">
    <div class="text-9xl font-extrabold text-gradient">404</div>
    <h1 class="text-3xl mt-2">Halaman Tidak Ditemukan</h1>
    <p class="text-ink-500 mt-3">Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
    <a href="{{ route('home') }}" class="inline-block mt-6 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-full">← Kembali ke Beranda</a>
  </div>
</section>
@endsection
