<?php $__env->startSection('title','Geografis Desa'); ?>
<?php $__env->startSection('content'); ?>
<?php $S = fn($k,$d='-') => \App\Models\SiteSetting::get($k,$d); ?>
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Kondisi Geografis</h1><p class="text-primary-100 mt-3">Desa Ciwiru terletak di kaki Gunung Ciremai</p></div>
</section>
<section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-8">
  <div data-aos="fade-right">
    <h2 class="text-2xl mb-4">Letak Wilayah</h2>
    <table class="w-full text-sm">
      <?php $__currentLoopData = [
        ['Provinsi', $S('provinsi','Jawa Barat')],
        ['Kabupaten', $S('kabupaten','Kuningan')],
        ['Kecamatan', $S('kecamatan','Pasawahan')],
        ['Kode Pos', $S('kode_pos','45559')],
        ['Luas Wilayah', $S('luas_wilayah').' Hektar'],
        ['Ketinggian', $S('ketinggian','250-600 mdpl')],
        ['Jumlah Dusun', $S('jumlah_dusun').' Dusun'],
        ['Jumlah RW', $S('jumlah_rw').' RW'],
        ['Jumlah RT', $S('jumlah_rt').' RT'],
      ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b"><td class="py-2 font-semibold w-1/3"><?php echo e($r[0]); ?></td><td class="py-2"><?php echo e($r[1]); ?></td></tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <h2 class="text-2xl mt-8 mb-4">Batas Wilayah</h2>
    <div class="grid grid-cols-2 gap-3">
      <?php $__currentLoopData = ['Utara'=>'batas_utara','Selatan'=>'batas_selatan','Barat'=>'batas_barat','Timur'=>'batas_timur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arah => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="border rounded-xl p-4">
        <div class="text-xs uppercase text-ink-500 font-semibold">Sebelah <?php echo e($arah); ?></div>
        <div class="font-semibold mt-1"><?php echo e($S($key)); ?></div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <div data-aos="fade-left">
    <div id="map-geo" class="h-[500px] rounded-2xl overflow-hidden shadow-lg"></div>
  </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
  const m = L.map('map-geo').setView([-6.7961,108.4411],13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(m);
  L.marker([-6.7961,108.4411]).addTo(m).bindPopup('Desa Ciwiru, Pasawahan, Kuningan').openPopup();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/profil/geografis.blade.php ENDPATH**/ ?>