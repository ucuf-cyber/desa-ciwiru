<?php $__env->startSection('title','Pengguna'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6"><h1 class="text-2xl">Pengguna</h1><a href="<?php echo e(route('admin.users.create')); ?>" class="bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i>Tambah</a></div>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Nama</th><th class="px-4 py-3 text-left">Email</th><th class="px-4 py-3 text-left">Role</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr class="border-b"><td class="px-4 py-3"><?php echo e($u->name); ?></td><td><?php echo e($u->email); ?></td><td><span class="text-xs px-2 py-1 rounded bg-slate-100"><?php echo e(str_replace('_',' ',$u->role)); ?></span></td>
    <td><?php if($u->is_active): ?><span class="text-primary-700">Aktif</span><?php else: ?><span class="text-red-600">Nonaktif</span><?php endif; ?></td>
    <td><a href="<?php echo e(route('admin.users.edit',$u)); ?>" class="text-primary-700"><i class="fa-solid fa-pen"></i></a><form action="<?php echo e(route('admin.users.destroy',$u)); ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="text-red-600 ml-2"><i class="fa-solid fa-trash"></i></button></form></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
  </table>
</div>
<div class="mt-4"><?php echo e($users->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/users/index.blade.php ENDPATH**/ ?>