@extends('layouts.admin')
@section('title','Layanan Surat')
@section('content')
<h1 class="text-2xl mb-6">Permohonan Surat Online</h1>
<form method="GET" class="mb-4 flex gap-2"><select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-2"><option value="">Semua Status</option>@foreach(['pending','diverifikasi','disetujui','ditolak','selesai'] as $s)<option value="{{ $s }}" {{ request('status')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach</select></form>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Tiket</th><th class="px-4 py-3 text-left">Jenis</th><th class="px-4 py-3 text-left">Pemohon</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3 text-left">Tanggal</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>
      @foreach($items as $i)
        <tr class="border-b"><td class="px-4 py-3 font-mono">{{ $i->ticket_number }}</td><td>{{ $i->type }}</td><td>{{ $i->requester_name }}</td>
        <td><span class="text-xs px-2 py-1 rounded {{ $i->status==='selesai'?'bg-emerald-100 text-emerald-700':'bg-amber-100 text-amber-700' }}">{{ $i->status }}</span></td>
        <td>{{ $i->created_at->format('d M Y') }}</td>
        <td><a href="{{ route('admin.surat.show',$i) }}" class="text-primary-700">Detail <i class="fa-solid fa-arrow-right"></i></a></td></tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
