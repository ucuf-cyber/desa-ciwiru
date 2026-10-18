@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="min-h-[80vh] grid place-items-center px-4 py-10 relative overflow-hidden">
  <div class="blob bg-primary-400 w-80 h-80 top-10 -left-20"></div>
  <div class="blob bg-secondary-400 w-72 h-72 bottom-0 -right-20"></div>
  <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden" data-aos="zoom-in">
    <div class="gradient-hero px-8 py-10 text-center text-white relative overflow-hidden">
      <div class="absolute inset-0 opacity-30" style="background-image:radial-gradient(circle at 20% 30%, rgba(250,204,21,.3) 0%, transparent 50%), radial-gradient(circle at 80% 70%, rgba(96,165,250,.3) 0%, transparent 50%);"></div>
      <div class="relative w-20 h-20 mx-auto rounded-full bg-white p-2 logo-ring animate-float">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-2xl mt-4">Masuk ke Sistem</h1>
      <p class="text-primary-100 text-sm mt-1">Website Resmi {{ $siteName ?? 'Desa Ciwiru' }}</p>
    </div>
    <form action="{{ route('login.post') }}" method="POST" class="p-8 space-y-4">@csrf
      @if($errors->any())<div class="bg-red-50 border border-red-200 text-red-700 text-sm p-3 rounded animate-fade-in-up">{{ $errors->first() }}</div>@endif
      <div>
        <label class="text-sm text-ink-700 font-semibold">Email</label>
        <div class="relative mt-1">
          <i class="fa-solid fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-primary-400"></i>
          <input type="email" name="email" required value="{{ old('email') }}" placeholder="admin@desa-ciwiru.id" class="w-full border rounded-xl px-10 py-3 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition">
        </div>
      </div>
      <div>
        <label class="text-sm text-ink-700 font-semibold">Password</label>
        <div class="relative mt-1">
          <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-primary-400"></i>
          <input type="password" name="password" required class="w-full border rounded-xl px-10 py-3 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition">
        </div>
      </div>
      <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="checkbox" name="remember" class="rounded text-primary-600"> Ingat saya</label>
      <button class="w-full bg-gradient-to-r from-primary-700 to-primary-900 hover:from-primary-800 hover:to-primary-950 text-white font-semibold py-3 rounded-xl btn-shine transition shadow-lg hover:shadow-xl">Masuk <i class="fa-solid fa-arrow-right ml-1"></i></button>
      <a href="{{ route('home') }}" class="block text-center text-sm text-ink-500 hover:text-primary-700 transition">← Kembali ke beranda</a>
    </form>
  </div>
</div>
@endsection
