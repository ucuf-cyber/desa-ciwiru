<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="text-3xl mb-6">Selamat Datang, <?php echo e(auth()->user()->name); ?>!</h1>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
  <?php $__currentLoopData = [
    ['Kunjungan Hari Ini',$stats['visitors_today'],'fa-eye','sky'],
    ['Total Kunjungan',$stats['visitors_total'],'fa-chart-line','emerald'],
    ['Surat Pending',$stats['surat_pending'],'fa-file-signature','amber'],
    ['Pengaduan Baru',$stats['complaints_new'],'fa-bullhorn','red'],
    ['Berita Tayang',$stats['posts_published'],'fa-newspaper','indigo'],
    ['Total Wisata',$stats['wisata_total'],'fa-mountain-sun','green'],
    ['Total UMKM',$stats['umkm_total'],'fa-store','purple'],
  ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="bg-white p-5 rounded-2xl shadow">
    <div class="flex items-center justify-between">
      <div>
        <div class="text-sm text-slate-500"><?php echo e($s[0]); ?></div>
        <div class="text-3xl font-bold mt-2"><?php echo e(number_format($s[1],0,',','.')); ?></div>
      </div>
      <div class="w-12 h-12 grid place-items-center rounded-xl bg-<?php echo e($s[3]); ?>-100 text-<?php echo e($s[3]); ?>-600"><i class="fa-solid <?php echo e($s[2]); ?> text-xl"></i></div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="grid lg:grid-cols-2 gap-6 mb-6">
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-4">Tren Kunjungan 14 Hari</h3>
    <canvas id="chartVisitor" height="120"></canvas>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-4">Berita Terpopuler</h3>
    <ul class="space-y-3 text-sm">
      <?php $__currentLoopData = $topPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="flex justify-between border-b pb-2"><span class="line-clamp-1"><?php echo e($p->title); ?></span><span class="text-slate-500"><?php echo e($p->views); ?>x</span></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-3">Surat Terbaru</h3>
    <table class="w-full text-sm">
      <?php $__currentLoopData = $recentSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b"><td class="py-2"><?php echo e($s->ticket_number); ?></td><td><?php echo e($s->type); ?></td><td><span class="text-xs px-2 py-1 rounded bg-emerald-100 text-emerald-700"><?php echo e($s->status); ?></span></td></tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow">
    <h3 class="font-bold mb-3">Pengaduan Terbaru</h3>
    <table class="w-full text-sm">
      <?php $__currentLoopData = $recentComplaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b"><td class="py-2"><?php echo e($c->ticket_number); ?></td><td class="line-clamp-1"><?php echo e($c->subject); ?></td><td><span class="text-xs px-2 py-1 rounded bg-amber-100 text-amber-700"><?php echo e($c->status); ?></span></td></tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
  new Chart(document.getElementById('chartVisitor'),{type:'line',data:{labels:<?php echo json_encode($visitorTrend->pluck('day'), 15, 512) ?>,datasets:[{label:'Kunjungan',data:<?php echo json_encode($visitorTrend->pluck('total'), 15, 512) ?>,borderColor:'#10b981',backgroundColor:'rgba(16,185,129,.15)',fill:true,tension:.4}]},options:{plugins:{legend:{display:false}}}});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>