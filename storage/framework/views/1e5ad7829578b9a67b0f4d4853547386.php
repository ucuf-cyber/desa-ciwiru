<?php $__env->startSection('title','Galeri'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Galeri Foto & Video</h1><p class="text-primary-100 mt-3">Dokumentasi kegiatan & keindahan Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('galeri.show', $a->slug)); ?>" class="card-hover relative h-64 rounded-2xl overflow-hidden block" data-aos="zoom-in">
      <img src="<?php echo e($a->cover ?: 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800'); ?>" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
      <div class="absolute bottom-0 p-5 text-white">
        <span class="text-xs bg-primary-500 px-2 py-1 rounded-full"><?php echo e($a->items_count); ?> Foto</span>
        <h3 class="text-xl mt-2"><?php echo e($a->title); ?></h3>
      </div>
    </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/galeri/index.blade.php ENDPATH**/ ?>