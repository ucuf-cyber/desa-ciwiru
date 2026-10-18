@extends('layouts.app')
@section('title','Statistik Desa')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Statistik Desa Ciwiru</h1><p class="text-primary-100 mt-3">Visualisasi data kependudukan</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
    @foreach([['Total',$data['total'],'fa-users','emerald'],['Laki-laki',$data['laki'],'fa-mars','blue'],['Perempuan',$data['perempuan'],'fa-venus','pink'],['Kepala Keluarga',$data['kk'],'fa-house','amber']] as $c)
      <div class="bg-white shadow rounded-2xl p-6"><i class="fa-solid {{$c[2]}} text-{{$c[3]}}-500 text-2xl"></i><div class="text-3xl font-bold mt-3">{{ number_format($c[1],0,',','.') }}</div><div class="text-sm text-ink-500">{{ $c[0] }}</div></div>
    @endforeach
  </div>
  <div class="grid lg:grid-cols-2 gap-6">
    @foreach(['usia'=>'Distribusi Usia','pendidikan'=>'Tingkat Pendidikan','pekerjaan'=>'Jenis Pekerjaan','agama'=>'Pemeluk Agama'] as $key=>$title)
      <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="font-bold mb-3">{{ $title }}</h3>
        <canvas id="chart-{{ $key }}" height="220"></canvas>
      </div>
    @endforeach
  </div>
</section>
@push('scripts')
<script>
  const palette = ['#10b981','#34d399','#6ee7b7','#f59e0b','#fbbf24','#fcd34d','#0ea5e9','#60a5fa','#a78bfa'];
  const data = @json($data);
  ['usia','pendidikan','pekerjaan','agama'].forEach((k,i) => {
    const arr = data[k];
    new Chart(document.getElementById('chart-'+k),{
      type: k==='agama'?'pie':'bar',
      data:{labels:arr.map(r=>r.label), datasets:[{label:'Jumlah', data:arr.map(r=>r.value), backgroundColor:palette}]},
      options:{responsive:true, plugins:{legend:{display:k==='agama'}}}
    });
  });
</script>
@endpush
@endsection
