<?php $__env->startSection('title','Pengaturan'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="text-2xl mb-6">Pengaturan Situs</h1>
<form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
  <div class="grid sm:grid-cols-2 gap-4">
    <?php $__currentLoopData = [
      'site_name'=>'Nama Situs','site_tagline'=>'Tagline','site_phone'=>'Telepon','site_email'=>'Email',
      'site_facebook'=>'Facebook URL','site_instagram'=>'Instagram URL',
      'kepala_desa'=>'Nama Kepala Desa','sekretaris_desa'=>'Sekretaris Desa',
      'jumlah_penduduk'=>'Jumlah Penduduk','jumlah_kk'=>'Jumlah KK',
      'jumlah_laki'=>'Jumlah Laki-laki','jumlah_perempuan'=>'Jumlah Perempuan',
      'luas_wilayah'=>'Luas Wilayah (Hektar)','jumlah_dusun'=>'Jumlah Dusun','jumlah_rw'=>'Jumlah RW','jumlah_rt'=>'Jumlah RT',
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div><label class="font-semibold text-sm"><?php echo e($label); ?></label><input type="text" name="settings[<?php echo e($key); ?>]" value="<?php echo e($settings[$key] ?? ''); ?>" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div><label class="font-semibold">Alamat</label><input type="text" name="settings[site_address]" value="<?php echo e($settings['site_address'] ?? ''); ?>" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Visi</label><textarea name="settings[visi]" id="ed-visi" rows="3" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e($settings['visi'] ?? ''); ?></textarea></div>
  <div><label class="font-semibold">Misi</label><textarea name="settings[misi]" id="ed-misi" rows="6" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e($settings['misi'] ?? ''); ?></textarea></div>
  <div><label class="font-semibold">Sejarah</label><textarea name="settings[sejarah]" id="ed-sejarah" rows="8" class="w-full border rounded-lg px-3 py-2 mt-1"><?php echo e($settings['sejarah'] ?? ''); ?></textarea></div>
  <button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan Pengaturan</button>
</form>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ['ed-visi','ed-misi','ed-sejarah'].forEach(id => ClassicEditor.create(document.getElementById(id)).catch(console.error));
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>