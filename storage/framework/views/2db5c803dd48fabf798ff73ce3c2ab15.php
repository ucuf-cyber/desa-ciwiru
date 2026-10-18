<?php $__env->startSection('title','Wisata Desa'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Wisata Desa Ciwiru</h1><p class="text-primary-100 mt-3">Eksplorasi pesona alam kaki Gunung Ciremai</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php $__currentLoopData = $wisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('wisata.show', $w->slug)); ?>" class="card-hover bg-white rounded-2xl overflow-hidden shadow block" data-aos="fade-up">
      <div class="aspect-video bg-slate-100" style="background-image:url('<?php echo e($w->thumbnail); ?>'); background-size:cover; background-position:center;"></div>
      <div class="p-5">
        <h3 class="text-xl"><?php echo e($w->name); ?></h3>
        <p class="text-sm text-ink-500 mt-2 line-clamp-3"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($w->description), 150)); ?></p>
        <div class="mt-4 flex justify-between text-sm">
          <span class="text-primary-700 font-semibold"><i class="fa-solid fa-ticket mr-1"></i>Rp <?php echo e(number_format($w->ticket_price,0,',','.')); ?></span>
          <span class="text-amber-600 font-semibold">Detail <i class="fa-solid fa-arrow-right ml-1"></i></span>
        </div>
      </div>
    </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<div class="max-w-7xl mx-auto px-4"><?php echo e($wisata->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/wisata/index.blade.php ENDPATH**/ ?>