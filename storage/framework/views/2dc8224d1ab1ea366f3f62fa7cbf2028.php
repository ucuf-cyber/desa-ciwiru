<?php $__env->startSection('title','Transparansi APBDes'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Transparansi APBDes</h1><p class="text-primary-100 mt-3">Anggaran Pendapatan dan Belanja Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <form method="GET" class="flex items-center gap-3 mb-8">
    <label class="font-semibold">Tahun Anggaran:</label>
    <select name="tahun" onchange="this.form.submit()" class="border rounded-lg px-3 py-2">
      <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($y); ?>" <?php echo e($y==$currentYear?'selected':''); ?>><?php echo e($y); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </form>

  <div class="grid sm:grid-cols-3 gap-4 mb-8">
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-emerald-500">
      <div class="text-sm text-ink-500">Total Pendapatan</div>
      <div class="text-2xl font-bold mt-1">Rp <?php echo e(number_format($summary['pendapatan'],0,',','.')); ?></div>
      <div class="text-xs text-emerald-600 mt-1">Realisasi: Rp <?php echo e(number_format($summary['realisasi_pendapatan'],0,',','.')); ?></div>
    </div>
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-amber-500">
      <div class="text-sm text-ink-500">Total Belanja</div>
      <div class="text-2xl font-bold mt-1">Rp <?php echo e(number_format($summary['belanja'],0,',','.')); ?></div>
      <div class="text-xs text-amber-600 mt-1">Realisasi: Rp <?php echo e(number_format($summary['realisasi_belanja'],0,',','.')); ?></div>
    </div>
    <div class="bg-white shadow rounded-2xl p-6 border-l-4 border-sky-500">
      <div class="text-sm text-ink-500">Pembiayaan</div>
      <div class="text-2xl font-bold mt-1">Rp <?php echo e(number_format($summary['pembiayaan'],0,',','.')); ?></div>
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
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b">
          <td class="px-4 py-3"><span class="text-xs px-2 py-1 rounded <?php echo e($r->type==='pendapatan'?'bg-emerald-100 text-emerald-700':($r->type==='belanja'?'bg-amber-100 text-amber-700':'bg-sky-100 text-sky-700')); ?>"><?php echo e(strtoupper($r->type)); ?></span></td>
          <td class="px-4 py-3"><?php echo e($r->category); ?></td>
          <td class="px-4 py-3 text-right">Rp <?php echo e(number_format($r->planned,0,',','.')); ?></td>
          <td class="px-4 py-3 text-right">Rp <?php echo e(number_format($r->realized,0,',','.')); ?></td>
          <td class="px-4 py-3 text-right"><?php echo e($r->planned > 0 ? round($r->realized/$r->planned*100,1) : 0); ?>%</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
  const pendapatan = <?php echo json_encode($rows->where('type', 'pendapatan')->values(), 512) ?>;
  const belanja = <?php echo json_encode($rows->where('type', 'belanja')->values(), 512) ?>;
  new Chart(document.getElementById('chartPendapatan'),{type:'doughnut',data:{labels:pendapatan.map(r=>r.category),datasets:[{data:pendapatan.map(r=>r.planned),backgroundColor:['#10b981','#34d399','#6ee7b7','#a7f3d0','#d1fae5']}]}});
  new Chart(document.getElementById('chartBelanja'),{type:'bar',data:{labels:belanja.map(r=>r.category),datasets:[{label:'Anggaran',data:belanja.map(r=>r.planned),backgroundColor:'#f59e0b'},{label:'Realisasi',data:belanja.map(r=>r.realized),backgroundColor:'#10b981'}]},options:{indexAxis:'y'}});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/apbdes.blade.php ENDPATH**/ ?>