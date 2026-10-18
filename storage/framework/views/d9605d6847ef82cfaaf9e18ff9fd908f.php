<?php $__env->startSection('title','Halaman Tidak Ditemukan'); ?>
<?php $__env->startSection('content'); ?>
<section class="min-h-[60vh] grid place-items-center px-4 py-16">
  <div class="text-center max-w-md">
    <div class="text-9xl font-extrabold text-gradient">404</div>
    <h1 class="text-3xl mt-2">Halaman Tidak Ditemukan</h1>
    <p class="text-ink-500 mt-3">Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
    <a href="<?php echo e(route('home')); ?>" class="inline-block mt-6 bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-full">← Kembali ke Beranda</a>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/errors/404.blade.php ENDPATH**/ ?>