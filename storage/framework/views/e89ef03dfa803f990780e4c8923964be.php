<?php $__env->startSection('title','Galeri'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Galeri</h1><a href="<?php echo e(route('admin.gallery.create')); ?>" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Album Baru</a></div>
<div class="grid sm:grid-cols-3 gap-6">
  <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white rounded-2xl shadow overflow-hidden">
      <div class="aspect-video bg-slate-200" style="background-image:url('<?php echo e($a->cover); ?>'); background-size:cover; background-position:center;"></div>
      <div class="p-4">
        <h3 class="font-bold"><?php echo e($a->title); ?></h3>
        <div class="text-xs text-slate-500"><?php echo e($a->items_count); ?> foto</div>
        <div class="mt-3 flex gap-2">
          <a href="<?php echo e(route('admin.gallery.show',$a)); ?>" class="text-primary-700 text-sm">Kelola Foto</a>
          <form action="<?php echo e(route('admin.gallery.destroy',$a)); ?>" method="POST" onsubmit="return confirm('Hapus album?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="text-red-600 text-sm">Hapus</button></form>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/gallery/index.blade.php ENDPATH**/ ?>