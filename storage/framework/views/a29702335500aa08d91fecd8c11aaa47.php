<?php $__env->startSection('title','Kelola Wisata'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Wisata</h1><a href="<?php echo e(route('admin.wisata.create')); ?>" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Tiket</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr class="border-b"><td class="px-4 py-3"><?php echo e($w->name); ?></td><td>Rp <?php echo e(number_format($w->ticket_price,0,',','.')); ?></td><td><span class="text-xs px-2 py-1 rounded bg-emerald-100 text-emerald-700"><?php echo e($w->status); ?></span></td>
    <td><a href="<?php echo e(route('admin.wisata.edit',$w)); ?>" class="text-primary-700"><i class="fa-solid fa-pen"></i></a>
    <form action="<?php echo e(route('admin.wisata.destroy',$w)); ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
  </table>
</div>
<div class="mt-4"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/wisata/index.blade.php ENDPATH**/ ?>