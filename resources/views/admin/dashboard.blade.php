@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<h1 class="text-3xl mb-6">Selamat Datang, {{ auth()->user()->name }}!</h1>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
  @foreach([
    ['Kunjungan Hari Ini',$stats['visitors_today'],'fa-eye','sky'],
    ['Total Kunjungan',$stats['visitors_total'],'fa-chart-line','emerald'],
    ['Surat Pending',$stats['surat_pending'],'fa-file-signature','amber'],
    ['Pengaduan Baru',$stats['complaints_new'],'fa-bullhorn','red'],
    ['Berita Tayang',$stats['posts_published'],'fa-newspaper','indigo'],
    ['Total Wisata',$stats['wisata_total'],'fa-mountain-sun','green'],
    ['Total UMKM',$stats['umkm_total'],'fa-store','purple'],
  ] as $s)
  <div class="bg-white p-5 rounded-2xl shadow">
    <div class="flex items-center justify-between">
      <div>
        <div class="text-sm text-slate-500">{{ $s[0] }}</div>
        <div class="text-3xl font-bold mt-2">{{ number_format($s[1],0,',','.') }}</div>
      </div>
      <div class="w-12 h-12 grid place-items-center rounded-xl bg-{{ $s[3] }}-100 text-{{ $s[3] }}-600"><i class="fa-solid {{ $s[2] }} text-xl"></i></div>
    </div>
  </div>
  @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6 mb-6">
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-4">Tren Kunjungan 14 Hari</h3>
    <canvas id="chartVisitor" height="120"></canvas>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-4">Berita Terpopuler</h3>
    <ul class="space-y-3 text-sm">
      @foreach($topPosts as $p)
        <li class="flex justify-between border-b pb-2"><span class="line-clamp-1">{{ $p->title }}</span><span class="text-slate-500">{{ $p->views }}x</span></li>
      @endforeach
    </ul>
  </div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-3">Surat Terbaru</h3>
    <table class="w-full text-sm">
      @foreach($recentSurat as $s)
        <tr class="border-b"><td class="py-2">{{ $s->ticket_number }}</td><td>{{ $s->type }}</td><td><span class="text-xs px-2 py-1 rounded bg-emerald-100 text-emerald-700">{{ $s->status }}</span></td></tr>
      @endforeach
    </table>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-3">Pengaduan Terbaru</h3>
    <table class="w-full text-sm">
      @foreach($recentComplaints as $c)
        <tr class="border-b"><td class="py-2">{{ $c->ticket_number }}</td><td class="line-clamp-1">{{ $c->subject }}</td><td><span class="text-xs px-2 py-1 rounded bg-amber-100 text-amber-700">{{ $c->status }}</span></td></tr>
      @endforeach
    </table>
  </div>
</div>

@push('scripts')
<script>
  new Chart(document.getElementById('chartVisitor'),{type:'line',data:{labels:@json($visitorTrend->pluck('day')),datasets:[{label:'Kunjungan',data:@json($visitorTrend->pluck('total')),borderColor:'#10b981',backgroundColor:'rgba(16,185,129,.15)',fill:true,tension:.4}]},options:{plugins:{legend:{display:false}}}});
</script>
@endpush
@endsection
