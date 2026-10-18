<?php $__env->startSection('title',$wisata->name); ?>
<?php $__env->startSection('content'); ?>
<section class="relative h-[400px]">
  <img src="<?php echo e($wisata->thumbnail); ?>" class="absolute inset-0 w-full h-full object-cover">
  <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-black/30"></div>
  <div class="absolute bottom-0 max-w-7xl mx-auto inset-x-0 px-4 pb-8 text-white">
    <div class="text-sm text-primary-200"><a href="<?php echo e(route('wisata.index')); ?>" class="hover:underline">Wisata</a></div>
    <h1 class="text-4xl sm:text-5xl mt-2"><?php echo e($wisata->name); ?></h1>
    <div class="mt-2 flex gap-4 text-sm"><span><i class="fa-solid fa-ticket mr-1"></i>Rp <?php echo e(number_format($wisata->ticket_price,0,',','.')); ?></span></div>
  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2">
    <h2 class="text-2xl mb-3">Deskripsi</h2>
    <div class="prose-content text-ink-700"><?php echo nl2br(e($wisata->description)); ?></div>
    <?php if($wisata->route): ?>
      <h2 class="text-2xl mt-8 mb-3">Rute Menuju Lokasi</h2>
      <p class="text-ink-700"><?php echo e($wisata->route); ?></p>
    <?php endif; ?>
    <?php if(!empty($wisata->facilities)): ?>
      <h2 class="text-2xl mt-8 mb-3">Fasilitas</h2>
      <div class="flex flex-wrap gap-2">
        <?php $__currentLoopData = $wisata->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><span class="bg-primary-100 text-primary-700 text-sm px-3 py-1 rounded-full"><?php echo e($f); ?></span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>
  <aside class="space-y-6">
    <?php if(!empty($wisata->open_hours)): ?>
      <div class="bg-white border rounded-2xl p-5">
        <h3 class="font-bold mb-3"><i class="fa-regular fa-clock mr-2 text-primary-600"></i>Jam Buka</h3>
        <ul class="text-sm space-y-1">
          <?php $__currentLoopData = $wisata->open_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hari => $jam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="flex justify-between border-b py-1"><span class="capitalize"><?php echo e($hari); ?></span><span><?php echo e($jam); ?></span></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>
    <?php if($wisata->lat && $wisata->lng): ?>
      <div id="map" class="h-64 rounded-2xl overflow-hidden shadow"></div>
    <?php endif; ?>
  </aside>
</section>

<?php if($related->count()): ?>
<section class="max-w-7xl mx-auto px-4 pb-16">
  <h3 class="text-2xl mb-6">Wisata Lainnya</h3>
  <div class="grid sm:grid-cols-3 gap-6">
    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('wisata.show', $r->slug)); ?>" class="card-hover relative h-48 rounded-xl overflow-hidden block">
        <img src="<?php echo e($r->thumbnail); ?>" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
        <div class="absolute bottom-0 p-4 text-white"><h4 class="font-bold"><?php echo e($r->name); ?></h4></div>
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php endif; ?>

<?php if($wisata->lat && $wisata->lng): ?>
<?php $__env->startPush('scripts'); ?>
<script>
  const map = L.map('map').setView([<?php echo e($wisata->lat); ?>,<?php echo e($wisata->lng); ?>],15);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
  L.marker([<?php echo e($wisata->lat); ?>,<?php echo e($wisata->lng); ?>]).addTo(map).bindPopup('<?php echo e($wisata->name); ?>').openPopup();
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/wisata/show.blade.php ENDPATH**/ ?>