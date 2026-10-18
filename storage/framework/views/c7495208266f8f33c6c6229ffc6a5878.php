<?php $__env->startSection('title','Pengaduan'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="text-2xl mb-6">Pengaduan Masyarakat</h1>
<form method="GET" class="mb-4"><select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-2"><option value="">Semua</option><?php $__currentLoopData = ['baru','diproses','selesai','ditolak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php echo e(request('status')==$s?'selected':''); ?>><?php echo e(ucfirst($s)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></form>
<div class="bg-white rounded-2xl shadow overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Tiket</th><th class="px-4 py-3 text-left">Subjek</th><th class="px-4 py-3 text-left">Kategori</th><th class="px-4 py-3 text-left">Pelapor</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3">Aksi</th></tr></thead>
    <tbody>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b"><td class="px-4 py-3 font-mono"><?php echo e($i->ticket_number); ?></td><td class="line-clamp-1 max-w-xs"><?php echo e($i->subject); ?></td><td><?php echo e($i->category); ?></td><td><?php echo e($i->is_anonymous?'Anonim':$i->reporter_name); ?></td>
        <td><span class="text-xs px-2 py-1 rounded <?php echo e($i->status==='selesai'?'bg-emerald-100 text-emerald-700':'bg-amber-100 text-amber-700'); ?>"><?php echo e($i->status); ?></span></td>
        <td><a href="<?php echo e(route('admin.complaints.show',$i)); ?>" class="text-primary-700">Detail</a></td></tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<div class="mt-4"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/complaints/index.blade.php ENDPATH**/ ?>