@extends('layouts.admin')
@section('title','Pengaduan')
@section('content')
<h1 class="text-2xl mb-6">Pengaduan Masyarakat</h1>
<form method="GET" class="mb-4"><select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-2"><option value="">Semua</option>@foreach(['baru','diproses','selesai','ditolak'] as $s)<option value="{{ $s }}" {{ request('status')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach</select></form>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Tiket</th><th class="px-4 py-3 text-left">Subjek</th><th class="px-4 py-3 text-left">Kategori</th><th class="px-4 py-3 text-left">Pelapor</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>
      @foreach($items as $i)
        <tr class="border-b"><td class="px-4 py-3 font-mono">{{ $i->ticket_number }}</td><td class="line-clamp-1 max-w-xs">{{ $i->subject }}</td><td>{{ $i->category }}</td><td>{{ $i->is_anonymous?'Anonim':$i->reporter_name }}</td>
        <td><span class="text-xs px-2 py-1 rounded {{ $i->status==='selesai'?'bg-emerald-100 text-emerald-700':'bg-amber-100 text-amber-700' }}">{{ $i->status }}</span></td>
        <td><a href="{{ route('admin.complaints.show',$i) }}" class="text-primary-700">Detail</a></td></tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
