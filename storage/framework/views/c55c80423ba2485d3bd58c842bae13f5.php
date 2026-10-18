<?php $__env->startSection('title','Perangkat Desa'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Perangkat Desa</h1><a href="<?php echo e(route('admin.officials.create')); ?>" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Urutan</th><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Jabatan</th><th class="px-4 py-3 text-left">Divisi</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr class="border-b"><td class="px-4 py-3"><?php echo e($o->sort_order); ?></td><td><?php echo e($o->name); ?></td><td><?php echo e($o->position); ?></td><td><?php echo e($o->division); ?></td>
    <td><a href="<?php echo e(route('admin.officials.edit',$o)); ?>" class="text-primary-700"><i class="fa-solid fa-pen"></i></a><form action="<?php echo e(route('admin.officials.destroy',$o)); ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/officials/index.blade.php ENDPATH**/ ?>