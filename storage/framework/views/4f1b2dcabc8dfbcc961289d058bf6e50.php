<?php $__env->startSection('title','Pengaduan Masyarakat'); ?>
<?php $__env->startSection('content'); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Pengaduan Masyarakat</h1><p class="text-primary-100 mt-3">Sampaikan keluhan, saran, atau laporan secara aman</p></div>
</section>
<section class="max-w-3xl mx-auto px-4 py-12">
  <form action="<?php echo e(route('layanan.pengaduan.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl p-8 space-y-5" x-data="{anon:false}"><?php echo csrf_field(); ?>
    <label class="flex items-center gap-2"><input type="checkbox" name="is_anonymous" value="1" x-model="anon"> Kirim sebagai anonim</label>
    <div class="grid sm:grid-cols-2 gap-4" x-show="!anon">
      <div><label class="font-semibold">Nama Pelapor</label><input type="text" name="reporter_name" class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      <div><label class="font-semibold">No. HP/WA</label><input type="text" name="reporter_phone" class="mt-1 w-full border rounded-lg px-3 py-2"></div>
    </div>
    <div class="grid sm:grid-cols-2 gap-4">
      <div>
        <label class="font-semibold">Kategori *</label>
        <select name="category" required class="mt-1 w-full border rounded-lg px-3 py-2">
          <option value="">-- Pilih kategori --</option>
          <?php $__currentLoopData = ['Infrastruktur','Lingkungan','Pelayanan','Sosial','Keamanan','Kesehatan','Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($c); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div><label class="font-semibold">Lokasi Kejadian</label><input type="text" name="location" class="mt-1 w-full border rounded-lg px-3 py-2"></div>
    </div>
    <div><label class="font-semibold">Subjek / Judul *</label><input type="text" name="subject" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
    <div><label class="font-semibold">Uraian *</label><textarea name="description" rows="5" required class="mt-1 w-full border rounded-lg px-3 py-2"></textarea></div>
    <div>
      <label class="font-semibold">Bukti / Foto Pendukung</label>
      <input type="file" name="evidence[]" multiple class="mt-1 w-full border rounded-lg px-3 py-2 bg-white">
    </div>
    <button class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 rounded-lg"><i class="fa-solid fa-bullhorn mr-2"></i>Kirim Pengaduan</button>
  </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/layanan/pengaduan-form.blade.php ENDPATH**/ ?>