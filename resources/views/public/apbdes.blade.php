@extends('layouts.app')
@section('title','Transparansi APBDes')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Transparansi APBDes</h1><p class="text-primary-100 mt-3">Anggaran Pendapatan dan Belanja Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <form method="GET" class="flex items-center gap-3 mb-8">
    <label class="font-semibold">Tahun Anggaran:</label>
    <select name="tahun" onchange="this.form.submit()" class="border rounded-lg px-3 py-2">
      @foreach($years as $y)<option value="{{ $y }}" {{ $y==$currentYear?'selected':'' }}>{{ $y }}</option>@endforeach
    </select>
  </form>

  <div class="grid sm:grid-cols-3 gap-4 mb-8">
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-emerald-500">
      <div class="text-sm text-ink-500">Total Pendapatan</div>
      <div class="text-2xl font-bold mt-1">Rp {{ number_format($summary['pendapatan'],0,',','.') }}</div>
      <div class="text-xs text-emerald-600 mt-1">Realisasi: Rp {{ number_format($summary['realisasi_pendapatan'],0,',','.') }}</div>
    </div>
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-amber-500">
      <div class="text-sm text-ink-500">Total Belanja</div>
      <div class="text-2xl font-bold mt-1">Rp {{ number_format($summary['belanja'],0,',','.') }}</div>
      <div class="text-xs text-amber-600 mt-1">Realisasi: Rp {{ number_format($summary['realisasi_belanja'],0,',','.') }}</div>
    </div>
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-sky-500">
      <div class="text-sm text-ink-500">Pembiayaan</div>
      <div class="text-2xl font-bold mt-1">Rp {{ number_format($summary['pembiayaan'],0,',','.') }}</div>
    </div>
  </div>

  <div class="grid lg:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow">
      <h3 class="font-bold mb-3">Pendapatan Desa</h3>
      <canvas id="chartPendapatan" height="200"></canvas>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
      <h3 class="font-bold mb-3">Belanja Desa</h3>
      <canvas id="chartBelanja" height="200"></canvas>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-primary-800 text-white">
        <tr><th class="px-4 py-3 text-left">Jenis</th><th class="px-4 py-3 text-left">Kategori</th><th class="px-4 py-3 text-right">Anggaran</th><th class="px-4 py-3 text-right">Realisasi</th><th class="px-4 py-3 text-right">%</th></tr>
      </thead>
      <tbody>
        @foreach($rows as $r)
        <tr class="border-b">
          <td class="px-4 py-3"><span class="text-xs px-2 py-1 rounded {{ $r->type==='pendapatan'?'bg-emerald-100 text-emerald-700':($r->type==='belanja'?'bg-amber-100 text-amber-700':'bg-sky-100 text-sky-700') }}">{{ strtoupper($r->type) }}</span></td>
          <td class="px-4 py-3">{{ $r->category }}</td>
          <td class="px-4 py-3 text-right">Rp {{ number_format($r->planned,0,',','.') }}</td>
          <td class="px-4 py-3 text-right">Rp {{ number_format($r->realized,0,',','.') }}</td>
          <td class="px-4 py-3 text-right">{{ $r->planned > 0 ? round($r->realized/$r->planned*100,1) : 0 }}%</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@push('scripts')
<script>
  const pendapatan = @json($rows->where('type','pendapatan')->values());
  const belanja = @json($rows->where('type','belanja')->values());
  new Chart(document.getElementById('chartPendapatan'),{type:'doughnut',data:{labels:pendapatan.map(r=>r.category),datasets:[{data:pendapatan.map(r=>r.planned),backgroundColor:['#10b981','#34d399','#6ee7b7','#a7f3d0','#d1fae5']}]}});
  new Chart(document.getElementById('chartBelanja'),{type:'bar',data:{labels:belanja.map(r=>r.category),datasets:[{label:'Anggaran',data:belanja.map(r=>r.planned),backgroundColor:'#f59e0b'},{label:'Realisasi',data:belanja.map(r=>r.realized),backgroundColor:'#10b981'}]},options:{indexAxis:'y'}});
</script>
@endpush
@endsection
