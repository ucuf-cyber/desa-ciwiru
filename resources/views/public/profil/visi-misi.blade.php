@extends('layouts.app')
@section('title','Visi & Misi')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Visi & Misi Desa Ciwiru</h1></div>
</section>
<section class="max-w-5xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-8">
  <div data-aos="fade-up" class="bg-gradient-to-br from-primary-600 to-emerald-800 text-white rounded-2xl p-8">
    <i class="fa-solid fa-eye text-3xl text-secondary-500"></i>
    <h2 class="text-2xl mt-3">Visi</h2>
    <p class="mt-4 leading-relaxed">{{ \App\Models\SiteSetting::get('visi') }}</p>
  </div>
  <div data-aos="fade-up" class="bg-white border rounded-2xl p-8 shadow-sm">
    <i class="fa-solid fa-bullseye text-3xl text-primary-600"></i>
    <h2 class="text-2xl mt-3">Misi</h2>
    <div class="mt-4 space-y-2 text-ink-700 whitespace-pre-line">{{ \App\Models\SiteSetting::get('misi') }}</div>
  </div>
</section>
@endsection
