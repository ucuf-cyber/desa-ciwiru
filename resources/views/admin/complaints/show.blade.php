@extends('layouts.admin')
@section('title','Detail Pengaduan')
@section('content')
<h1 class="text-2xl mb-6">Detail Pengaduan</h1>
<div class="grid lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
    <div class="font-mono text-amber-700">{{ $complaint->ticket_number }}</div>
    <h3 class="text-xl mt-2">{{ $complaint->subject }}</h3>
    <p class="text-slate-500 text-sm mt-1">{{ $complaint->category }} - {{ $complaint->location }}</p>
    <p class="mt-6 text-ink-700">{{ $complaint->description }}</p>
    <div class="mt-6 text-sm">
      <div class="text-slate-500">Pelapor: <span class="text-ink-900">{{ $complaint->is_anonymous?'Anonim':($complaint->reporter_name.' - '.$complaint->reporter_phone) }}</span></div>
      <div class="text-slate-500">Tanggal: <span class="text-ink-900">{{ $complaint->created_at->translatedFormat('d F Y H:i') }}</span></div>
    </div>
  </div>
  <div class="bg-white rounded-2xl shadow p-6">
    <h3 class="font-bold mb-4">Tindak Lanjut</h3>
    <form action="{{ route('admin.complaints.update',$complaint) }}" method="POST" class="space-y-4">@csrf @method('PUT')
      <div><label class="font-semibold text-sm">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1">@foreach(['baru','diproses','selesai','ditolak'] as $s)<option value="{{ $s }}" {{ $complaint->status==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
      <div><label class="font-semibold text-sm">Respon</label><textarea name="admin_response" rows="5" class="w-full border rounded-lg px-3 py-2 mt-1">{{ $complaint->admin_response }}</textarea></div>
      <button class="w-full bg-primary-700 hover:bg-primary-800 text-white py-2 rounded-lg transition">Simpan</button>
    </form>
  </div>
</div>
@endsection
