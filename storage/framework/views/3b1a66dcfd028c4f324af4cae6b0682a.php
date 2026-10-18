<?php $__env->startSection('title','Statistik Desa'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Statistik Desa Ciwiru</h1><p class="text-primary-100 mt-3">Visualisasi data kependudukan</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
    <?php $__currentLoopData = [['Total',$data['total'],'fa-users','emerald'],['Laki-laki',$data['laki'],'fa-mars','blue'],['Perempuan',$data['perempuan'],'fa-venus','pink'],['Kepala Keluarga',$data['kk'],'fa-house','amber']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white shadow rounded-2xl p-6"><i class="fa-solid <?php echo e($c[2]); ?> text-<?php echo e($c[3]); ?>-500 text-2xl"></i><div class="text-3xl font-bold mt-3"><?php echo e(number_format($c[1],0,',','.')); ?></div><div class="text-sm text-ink-500"><?php echo e($c[0]); ?></div></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="grid lg:grid-cols-2 gap-6">
    <?php $__currentLoopData = ['usia'=>'Distribusi Usia','pendidikan'=>'Tingkat Pendidikan','pekerjaan'=>'Jenis Pekerjaan','agama'=>'Pemeluk Agama']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="font-bold mb-3"><?php echo e($title); ?></h3>
        <canvas id="chart-<?php echo e($key); ?>" height="220"></canvas>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
  const palette = ['#10b981','#34d399','#6ee7b7','#f59e0b','#fbbf24','#fcd34d','#0ea5e9','#60a5fa','#a78bfa'];
  const data = <?php echo json_encode($data, 15, 512) ?>;
  ['usia','pendidikan','pekerjaan','agama'].forEach((k,i) => {
    const arr = data[k];
    new Chart(document.getElementById('chart-'+k),{
      type: k==='agama'?'pie':'bar',
      data:{labels:arr.map(r=>r.label), datasets:[{label:'Jumlah', data:arr.map(r=>r.value), backgroundColor:palette}]},
      options:{responsive:true, plugins:{legend:{display:k==='agama'}}}
    });
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/statistik.blade.php ENDPATH**/ ?>