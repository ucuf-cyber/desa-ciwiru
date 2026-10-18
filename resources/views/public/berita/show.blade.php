@extends('layouts.app')
@section('title',$post->title)
@section('meta_description',$post->meta_description ?? $post->excerpt)
@section('content')
<section class="bg-white border-b">
  <div class="max-w-4xl mx-auto px-4 py-10">
    <div class="text-sm text-ink-500"><a href="{{ route('berita.index') }}" class="hover:underline">Berita</a> / {{ $post->category->name ?? 'Umum' }}</div>
    <h1 class="text-3xl sm:text-4xl mt-3 leading-tight">{{ $post->title }}</h1>
    <div class="mt-4 flex items-center gap-4 text-sm text-ink-500">
      <span><i class="fa-regular fa-user mr-1"></i>{{ $post->author->name ?? 'Admin Desa' }}</span>
      <span><i class="fa-regular fa-clock mr-1"></i>{{ $post->published_at->translatedFormat('d F Y') }}</span>
      <span><i class="fa-regular fa-eye mr-1"></i>{{ $post->views }}x dilihat</span>
    </div>
  </div>
</section>
<article class="max-w-4xl mx-auto px-4 py-10">
  <div class="aspect-video rounded-2xl overflow-hidden bg-slate-100 mb-8" style="background-image:url('https://images.unsplash.com/photo-1568667256549-094345857637?w=1400'); background-size:cover; background-position:center;"></div>
  <div class="prose-content text-ink-700">{!! $post->body !!}</div>
  <div class="mt-8 flex flex-wrap items-center gap-3 border-t pt-6">
    <span class="text-sm font-semibold">Bagikan:</span>
    <a target="_blank" href="https://wa.me/?text={{ urlencode($post->title.' '.url()->current()) }}" class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-sm"><i class="fa-brands fa-whatsapp mr-1"></i>WhatsApp</a>
    <a target="_blank" href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="bg-blue-600 text-white px-3 py-1.5 rounded-lg text-sm"><i class="fa-brands fa-facebook mr-1"></i>Facebook</a>
    <a target="_blank" href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" class="bg-sky-500 text-white px-3 py-1.5 rounded-lg text-sm"><i class="fa-brands fa-twitter mr-1"></i>Twitter</a>
  </div>
</article>
@if($related->count())
<section class="max-w-7xl mx-auto px-4 pb-16">
  <h3 class="text-2xl mb-6">Berita Terkait</h3>
  <div class="grid sm:grid-cols-3 gap-6">
    @foreach($related as $r)
      <a href="{{ route('berita.show', $r->slug) }}" class="card-hover bg-white border rounded-2xl overflow-hidden">
        <div class="aspect-video bg-slate-100" style="background-image:url('https://images.unsplash.com/photo-1568667256549-094345857637?w=800'); background-size:cover;"></div>
        <div class="p-4"><h4 class="font-bold line-clamp-2">{{ $r->title }}</h4><div class="text-xs text-ink-500 mt-2">{{ $r->published_at->translatedFormat('d M Y') }}</div></div>
      </a>
    @endforeach
  </div>
</section>
@endif
@endsection
