<?php $__env->startSection('title',$album->title); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-sm text-primary-200"><a href="<?php echo e(route('galeri.index')); ?>" class="hover:underline">Galeri</a></div>
    <h1 class="text-4xl mt-2"><?php echo e($album->title); ?></h1>
    <p class="text-primary-100 mt-2"><?php echo e($album->description); ?></p>
  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php $__currentLoopData = $album->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e($it->file_path); ?>" target="_blank" class="card-hover block aspect-square rounded-xl overflow-hidden">
      <img src="<?php echo e($it->file_path); ?>" alt="<?php echo e($it->caption); ?>" class="w-full h-full object-cover hover:scale-110 transition">
    </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/galeri/show.blade.php ENDPATH**/ ?>