<?php $__env->startSection('title','Berita'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Berita Desa Ciwiru</h1><p class="text-primary-100 mt-3">Informasi terkini seputar pembangunan dan kegiatan desa</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid lg:grid-cols-4 gap-8">
  <aside class="lg:col-span-1 space-y-6">
    <form method="GET" class="bg-white shadow rounded-xl p-4">
      <label class="text-sm font-semibold">Cari berita</label>
      <div class="flex mt-2 gap-2">
        <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="border rounded-lg w-full px-3 py-2 text-sm">
        <button class="bg-primary-600 text-white px-3 rounded-lg"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>
    <div class="bg-white shadow rounded-xl p-4">
      <h3 class="font-bold mb-3">Kategori</h3>
      <ul class="space-y-1 text-sm">
        <li><a href="<?php echo e(route('berita.index')); ?>" class="hover:text-primary-600">Semua Berita</a></li>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('berita.index', ['kategori'=>$c->slug])); ?>" class="flex justify-between hover:text-primary-600 <?php echo e(request('kategori')==$c->slug?'text-primary-600 font-semibold':''); ?>"><span><?php echo e($c->name); ?></span><span class="text-ink-500"><?php echo e($c->posts_count); ?></span></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </aside>
  <div class="lg:col-span-3">
    <div class="grid sm:grid-cols-2 gap-6">
      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e(route('berita.show', $p->slug)); ?>" class="card-hover bg-white rounded-2xl overflow-hidden shadow border block">
          <div class="aspect-video bg-slate-100" style="background-image:url('https://images.unsplash.com/photo-1568667256549-094345857637?w=800'); background-size:cover; background-position:center;"></div>
          <div class="p-5">
            <span class="text-xs bg-primary-100 text-primary-700 px-2 py-1 rounded font-semibold"><?php echo e($p->category->name ?? 'Umum'); ?></span>
            <h3 class="text-lg mt-3"><?php echo e($p->title); ?></h3>
            <p class="text-sm text-ink-500 mt-2 line-clamp-2"><?php echo e($p->excerpt); ?></p>
            <div class="text-xs text-ink-500 mt-3 flex gap-3"><span><i class="fa-regular fa-clock mr-1"></i><?php echo e($p->published_at->translatedFormat('d M Y')); ?></span><span><i class="fa-regular fa-eye mr-1"></i><?php echo e($p->views); ?></span></div>
          </div>
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-ink-500 col-span-2">Belum ada berita.</div>
      <?php endif; ?>
    </div>
    <div class="mt-8"><?php echo e($posts->links()); ?></div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/berita/index.blade.php ENDPATH**/ ?>