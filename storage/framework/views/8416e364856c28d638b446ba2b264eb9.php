<?php $__env->startSection('title','Detail Surat'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
  <h1 class="text-2xl">Detail Permohonan Surat</h1>
  <div class="flex gap-2">
    <a href="<?php echo e(route('admin.surat.pdf',$surat)); ?>" target="_blank" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition"><i class="fa-solid fa-file-pdf mr-1"></i>Cetak PDF</a>
    <a href="<?php echo e(route('admin.surat.index')); ?>" class="bg-slate-200 hover:bg-slate-300 px-4 py-2 rounded-lg transition">← Kembali</a>
  </div>
</div>
<div class="grid lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
    <div class="font-mono text-primary-700 font-bold"><?php echo e($surat->ticket_number); ?></div>
    <h3 class="text-xl mt-2"><?php echo e(\App\Models\SuratRequest::suratTypes()[$surat->type] ?? $surat->type); ?></h3>
    <span class="text-xs px-3 py-1 rounded-full <?php echo e($surat->status==='selesai'?'bg-emerald-100 text-emerald-700':($surat->status==='ditolak'?'bg-red-100 text-red-700':'bg-secondary-100 text-secondary-700')); ?> mt-2 inline-block"><?php echo e(strtoupper($surat->status)); ?></span>
    <dl class="grid grid-cols-2 gap-3 mt-6 text-sm">
      <dt class="text-slate-500">Nama</dt><dd><?php echo e($surat->requester_name); ?></dd>
      <dt class="text-slate-500">NIK</dt><dd><?php echo e($surat->requester_nik); ?></dd>
      <dt class="text-slate-500">No. HP</dt><dd><?php echo e($surat->requester_phone); ?></dd>
      <dt class="text-slate-500">Alamat</dt><dd><?php echo e($surat->requester_address); ?></dd>
      <dt class="text-slate-500">Keperluan</dt><dd class="col-span-1"><?php echo e($surat->purpose); ?></dd>
      <dt class="text-slate-500">Tanggal</dt><dd><?php echo e($surat->created_at->translatedFormat('d F Y H:i')); ?></dd>
    </dl>
    <?php if($surat->attachments): ?>
      <h4 class="font-semibold mt-6 mb-2">Lampiran</h4>
      <ul class="text-sm space-y-1">
        <?php $__currentLoopData = $surat->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><a href="<?php echo e(asset('storage/'.$a)); ?>" target="_blank" class="text-primary-600 hover:underline"><i class="fa-solid fa-paperclip mr-1"></i><?php echo e(basename($a)); ?></a></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    <?php endif; ?>
  </div>
  <div class="bg-white rounded-2xl shadow p-6">
    <h3 class="font-bold mb-4">Proses Surat</h3>
    <form action="<?php echo e(route('admin.surat.update',$surat)); ?>" method="POST" class="space-y-4"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div><label class="font-semibold text-sm">Status</label><select name="status" class="w-full border rounded-lg px-3 py-2 mt-1"><?php $__currentLoopData = ['pending','diverifikasi','disetujui','ditolak','selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php echo e($surat->status==$s?'selected':''); ?>><?php echo e(ucfirst($s)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
      <div><label class="font-semibold text-sm">Catatan</label><textarea name="notes" rows="4" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e($surat->notes); ?></textarea></div>
      <button class="w-full bg-primary-700 hover:bg-primary-800 text-white py-2 rounded-lg transition">Update Status</button>
    </form>
    <p class="text-xs text-slate-500 mt-4">Set status ke <strong>Disetujui</strong> atau <strong>Selesai</strong> kemudian klik <strong>Cetak PDF</strong> untuk menghasilkan surat resmi.</p>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/surat/show.blade.php ENDPATH**/ ?>