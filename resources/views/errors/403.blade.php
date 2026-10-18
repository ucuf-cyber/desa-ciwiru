@extends('layouts.app')
@section('title','Akses Ditolak')
@section('content')
<section class="min-h-[60vh] grid place-items-center px-4 py-16">
  <div class="text-center max-w-md">
    <div class="text-9xl font-extrabold text-amber-500">403</div>
    <h1 class="text-3xl mt-2">Akses Ditolak</h1>
    <p class="text-ink-500 mt-3">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ route('home') }}" class="inline-block mt-6 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-full">← Kembali ke Beranda</a>
  </div>
</section>
@endsection
