<?php $__env->startSection('title','Struktur Organisasi'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Struktur Organisasi</h1><p class="text-primary-100 mt-3">Perangkat Pemerintah Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__currentLoopData = $officials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white border rounded-2xl p-6 text-center card-hover" data-aos="fade-up">
        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-primary-500 to-primary-800 grid place-items-center text-white text-3xl font-bold"><?php echo e(strtoupper(substr($o->name,0,1))); ?></div>
        <h3 class="text-lg mt-3"><?php echo e($o->name); ?></h3>
        <div class="text-primary-700 font-semibold"><?php echo e($o->position); ?></div>
        <div class="text-xs text-ink-500 mt-1"><?php echo e($o->division); ?></div>
        <?php if($o->bio): ?><p class="text-sm text-ink-500 mt-3"><?php echo e($o->bio); ?></p><?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/organisasi.blade.php ENDPATH**/ ?>