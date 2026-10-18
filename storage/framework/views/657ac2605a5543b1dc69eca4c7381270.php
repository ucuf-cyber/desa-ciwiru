<?php $__env->startSection('title','UMKM'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Direktori UMKM</h1><p class="text-primary-100 mt-3">Dukung produk lokal warga Desa Ciwiru</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12">
  <form method="GET" class="bg-white rounded-xl shadow p-4 flex flex-wrap gap-3 mb-8">
    <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Cari UMKM..." class="flex-1 min-w-[200px] border rounded-lg px-3 py-2">
    <select name="kategori" class="border rounded-lg px-3 py-2">
      <option value="">Semua Kategori</option>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c); ?>" <?php echo e(request('kategori')==$c?'selected':''); ?>><?php echo e($c); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button class="bg-primary-600 text-white px-5 rounded-lg">Cari</button>
  </form>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__empty_1 = true; $__currentLoopData = $umkm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="card-hover bg-white rounded-2xl overflow-hidden shadow border" data-aos="fade-up">
        <a href="<?php echo e(route('umkm.show', $u->slug)); ?>">
          <div class="aspect-square bg-slate-100" style="background-image:url('<?php echo e($u->thumbnail); ?>'); background-size:cover; background-position:center;"></div>
        </a>
        <div class="p-5">
          <span class="text-xs bg-amber-100 text-amber-800 px-2 py-1 rounded font-semibold"><?php echo e($u->category); ?></span>
          <h3 class="text-lg mt-2"><?php echo e($u->name); ?></h3>
          <p class="text-xs text-ink-500 mt-1"><i class="fa-solid fa-user mr-1"></i><?php echo e($u->owner); ?></p>
          <p class="text-sm text-ink-700 mt-2 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit($u->description, 100)); ?></p>
          <div class="mt-4 flex justify-between items-center">
            <a href="<?php echo e(route('umkm.show', $u->slug)); ?>" class="text-primary-600 font-semibold text-sm">Detail</a>
            <?php if($u->whatsapp): ?>
              <a href="https://wa.me/<?php echo e($u->whatsapp); ?>" target="_blank" class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-sm"><i class="fa-brands fa-whatsapp mr-1"></i>Pesan</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="col-span-3 text-ink-500">Belum ada UMKM.</div>
    <?php endif; ?>
  </div>
  <div class="mt-8"><?php echo e($umkm->links()); ?></div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/umkm/index.blade.php ENDPATH**/ ?>