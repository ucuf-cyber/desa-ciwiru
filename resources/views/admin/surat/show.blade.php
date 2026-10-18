@extends('layouts.admin')
@section('title','Detail Surat')
@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-2xl">Detail Permohonan Surat</h1>
  <div class="flex gap-2">
    <a href="{{ route('admin.surat.pdf',$surat) }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-file-pdf mr-1"></i>Cetak PDF</a>
    <a href="{{ route('admin.surat.index') }}" class="bg-slate-200 hover:bg-slate-300 px-4 py-2 rounded-lg transition">← Kembali</a>
  </div>
</div>
<div class="grid lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
    <div class="font-mono text-primary-700 font-bold">{{ $surat->ticket_number }}</div>
    <h3 class="text-xl mt-2">{{ \App\Models\SuratRequest::suratTypes()[$surat->type] ?? $surat->type }}</h3>
    <span class="text-xs px-3 py-1 rounded-full {{ $surat->status==='selesai'?'bg-emerald-100 text-emerald-700':($surat->status==='ditolak'?'bg-red-100 text-red-700':'bg-secondary-100 text-secondary-700') }} mt-2 inline-block">{{ strtoupper($surat->status) }}</span>
    <dl class="grid grid-cols-2 gap-3 mt-6 text-sm">
      <dt class="text-slate-500">Nama</dt><dd>{{ $surat->requester_name }}</dd>
      <dt class="text-slate-500">NIK</dt><dd>{{ $surat->requester_nik }}</dd>
      <dt class="text-slate-500">No. HP</dt><dd>{{ $surat->requester_phone }}</dd>
      <dt class="text-slate-500">Alamat</dt><dd>{{ $surat->requester_address }}</dd>
      <dt class="text-slate-500">Keperluan</dt><dd class="col-span-1">{{ $surat->purpose }}</dd>
      <dt class="text-slate-500">Tanggal</dt><dd>{{ $surat->created_at->translatedFormat('d F Y H:i') }}</dd>
    </dl>
    @if($surat->attachments)
      <h4 class="font-semibold mt-6 mb-2">Lampiran</h4>
      <ul class="text-sm space-y-1">
        @foreach($surat->attachments as $a)<li><a href="{{ asset('storage/'.$a) }}" target="_blank" class="text-primary-600 hover:underline"><i class="fa-solid fa-paperclip mr-1"></i>{{ basename($a) }}</a></li>@endforeach
      </ul>
    @endif
  </div>
  <div class="bg-white rounded-2xl shadow p-6">
    <h3 class="font-bold mb-4">Proses Surat</h3>
    <form action="{{ route('admin.surat.update',$surat) }}" method="POST" class="space-y-4">@csrf @method('PUT')
      <div><label class="font-semibold text-sm">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['pending','diverifikasi','disetujui','ditolak','selesai'] as $s)<option value="{{ $s }}" {{ $surat->status==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
      <div><label class="font-semibold text-sm">Catatan</label><textarea name="notes" rows="4" class="w-full border rounded-lg px-3 py-2 mt-1">{{ $surat->notes }}</textarea></div>
      <button class="w-full bg-primary-700 hover:bg-primary-800 text-white py-2 rounded-lg transition">Update Status</button>
    </form>
    <p class="text-xs text-slate-500 mt-4">Set status ke <strong>Disetujui</strong> atau <strong>Selesai</strong> kemudian klik <strong>Cetak PDF</strong> untuk menghasilkan surat resmi.</p>
  </div>
</div>
@endsection
