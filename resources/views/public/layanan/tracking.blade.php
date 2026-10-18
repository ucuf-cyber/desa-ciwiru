@extends('layouts.app')
@section('title','Tracking Permohonan')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Tracking Status</h1><p class="text-primary-100 mt-3">Pantau status permohonan surat atau pengaduan Anda</p></div>
</section>
<section class="max-w-3xl mx-auto px-4 py-12">
  <form method="GET" class="bg-white p-6 rounded-2xl shadow flex gap-3">
    <input type="text" name="ticket" value="{{ request('ticket') ?? session('ticket') }}" placeholder="Masukkan nomor tiket (SRT-... atau PGD-...)" class="flex-1 border rounded-lg px-3 py-2">
    <button class="bg-primary-600 text-white px-5 rounded-lg">Cek</button>
  </form>

  @if($surat)
    <div class="bg-white shadow rounded-2xl p-6 mt-6">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl">Permohonan Surat #{{ $surat->ticket_number }}</h3>
        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $surat->status==='selesai'?'bg-emerald-100 text-emerald-700':($surat->status==='ditolak'?'bg-red-100 text-red-700':'bg-amber-100 text-amber-700') }}">{{ strtoupper($surat->status) }}</span>
      </div>
      <table class="w-full text-sm">
        <tr><td class="py-2 text-ink-500">Jenis Surat</td><td class="font-semibold">{{ $surat->type }}</td></tr>
        <tr><td class="py-2 text-ink-500">Pemohon</td><td>{{ $surat->requester_name }}</td></tr>
        <tr><td class="py-2 text-ink-500">Tanggal Pengajuan</td><td>{{ $surat->created_at->translatedFormat('d F Y H:i') }}</td></tr>
        @if($surat->notes)<tr><td class="py-2 text-ink-500">Catatan Admin</td><td>{{ $surat->notes }}</td></tr>@endif
      </table>
    </div>
  @endif

  @if($complaint)
    <div class="bg-white shadow rounded-2xl p-6 mt-6">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl">Pengaduan #{{ $complaint->ticket_number }}</h3>
        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $complaint->status==='selesai'?'bg-emerald-100 text-emerald-700':($complaint->status==='ditolak'?'bg-red-100 text-red-700':'bg-amber-100 text-amber-700') }}">{{ strtoupper($complaint->status) }}</span>
      </div>
      <table class="w-full text-sm">
        <tr><td class="py-2 text-ink-500">Subjek</td><td class="font-semibold">{{ $complaint->subject }}</td></tr>
        <tr><td class="py-2 text-ink-500">Kategori</td><td>{{ $complaint->category }}</td></tr>
        <tr><td class="py-2 text-ink-500">Tanggal</td><td>{{ $complaint->created_at->translatedFormat('d F Y H:i') }}</td></tr>
        @if($complaint->admin_response)<tr><td class="py-2 text-ink-500">Respon Admin</td><td>{{ $complaint->admin_response }}</td></tr>@endif
      </table>
    </div>
  @endif

  @if(request('ticket') && !$surat && !$complaint)
    <div class="mt-6 p-4 bg-red-100 text-red-700 rounded">Tiket tidak ditemukan. Periksa kembali nomor tiket Anda.</div>
  @endif
</section>
@endsection
