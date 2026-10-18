@extends('layouts.app')
@section('title','Sejarah Desa')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4" data-aos="fade-up">
    <span class="text-secondary-500 font-semibold">PROFIL DESA</span>
    <h1 class="text-4xl sm:text-5xl mt-2">Sejarah Desa Ciwiru</h1>
    <p class="text-primary-100 mt-3 max-w-3xl">Akar dan perjalanan Desa Ciwiru sejak masa lampau hingga era digital.</p>
  </div>
</section>
<section class="max-w-4xl mx-auto px-4 py-16">
  <article class="prose-content text-ink-700">
    {!! nl2br(e(\App\Models\SiteSetting::get('sejarah'))) !!}
  </article>
  <div class="mt-10 grid sm:grid-cols-3 gap-4">
    <a href="{{ route('profil.visi-misi') }}" class="card-hover bg-primary-50 rounded-2xl p-6 block">
      <i class="fa-solid fa-bullseye text-primary-600 text-2xl"></i>
      <div class="mt-3 font-bold">Visi & Misi</div>
      <div class="text-sm text-ink-500">Arah pembangunan desa</div>
    </a>
    <a href="{{ route('profil.geografis') }}" class="card-hover bg-amber-50 rounded-2xl p-6 block">
      <i class="fa-solid fa-mountain-sun text-amber-600 text-2xl"></i>
      <div class="mt-3 font-bold">Geografis</div>
      <div class="text-sm text-ink-500">Wilayah & topografi</div>
    </a>
    <a href="{{ route('profil.demografis') }}" class="card-hover bg-primary-50 rounded-2xl p-6 block">
      <i class="fa-solid fa-users text-primary-600 text-2xl"></i>
      <div class="mt-3 font-bold">Demografis</div>
      <div class="text-sm text-ink-500">Data penduduk desa</div>
    </a>
  </div>
</section>
@endsection
