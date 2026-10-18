<?php $__env->startSection('title','Beranda'); ?>
<?php $__env->startSection('content'); ?>


<section class="gradient-hero text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-15" style="background-image: url('https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=1600'); background-size: cover; background-position: center;"></div>
  <div class="blob bg-secondary-400 w-96 h-96 -top-20 -right-20"></div>
  <div class="blob bg-primary-400 w-96 h-96 bottom-0 -left-20 opacity-40"></div>
  <div class="relative max-w-7xl mx-auto px-4 py-20 lg:py-28 grid lg:grid-cols-2 gap-10 items-center">
    <div data-aos="fade-up">
      <span class="inline-flex items-center gap-2 bg-secondary-400 text-primary-900 text-xs font-bold px-3 py-1.5 rounded-full animate-pulse-soft"><i class="fa-solid fa-star"></i> WEBSITE RESMI PEMERINTAH DESA</span>
      <h1 class="text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight">Selamat Datang di <span class="text-gradient">Desa Ciwiru</span></h1>
      <p class="text-lg italic text-secondary-300 mt-2">"Tanjeur Winangun Kerta Wibawa"</p>
      <p class="mt-4 text-lg text-primary-100 max-w-xl"><?php echo e($siteTagline); ?></p>
      <div class="mt-6 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="200">
        <a href="<?php echo e(route('layanan.surat')); ?>" class="bg-secondary-400 hover:bg-secondary-500 text-primary-900 font-bold px-6 py-3 rounded-full btn-shine shadow-lg transition"><i class="fa-solid fa-file-pen mr-2"></i>Layanan Surat</a>
        <a href="<?php echo e(route('profil.sejarah')); ?>" class="glass hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-full transition"><i class="fa-solid fa-circle-info mr-2"></i>Tentang Desa</a>
      </div>
    </div>
    <div data-aos="fade-left" class="relative">
      <div class="absolute -top-6 -right-6 w-32 h-32 bg-secondary-400/30 rounded-full blur-2xl"></div>
      <div class="grid grid-cols-2 gap-4 relative">
        <?php $items = [
          ['icon'=>'fa-users','label'=>'Penduduk','value'=>$stats['penduduk'].' Jiwa','color'=>'secondary-400'],
          ['icon'=>'fa-house','label'=>'Kepala Keluarga','value'=>$stats['kk'].' KK','color'=>'secondary-400'],
          ['icon'=>'fa-mars','label'=>'Laki-laki','value'=>$stats['laki'].' Jiwa','color'=>'secondary-400'],
          ['icon'=>'fa-venus','label'=>'Perempuan','value'=>$stats['perempuan'].' Jiwa','color'=>'secondary-400'],
          ['icon'=>'fa-mountain-sun','label'=>'Luas Wilayah','value'=>$stats['luas'].' Ha','color'=>'secondary-400'],
          ['icon'=>'fa-map-location-dot','label'=>'Dusun','value'=>$stats['dusun'].' Dusun','color'=>'secondary-400'],
        ]; ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="glass rounded-2xl p-4 card-hover" data-aos="zoom-in" data-aos-delay="<?php echo e($i*80); ?>">
            <i class="fa-solid <?php echo e($it['icon']); ?> text-<?php echo e($it['color']); ?> text-2xl"></i>
            <div class="text-2xl font-bold mt-2 text-white"><?php echo e($it['value']); ?></div>
            <div class="text-sm text-primary-200"><?php echo e($it['label']); ?></div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <div class="absolute bottom-0 left-0 right-0">
    <svg class="w-full h-12 sm:h-20" preserveAspectRatio="none" viewBox="0 0 1440 80"><path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f8fafc"/></svg>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 -mt-8 relative z-10">
  <div class="bg-white rounded-3xl shadow-2xl p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 border border-primary-50">
    <?php $svc = [
      ['icon'=>'fa-file-signature','t'=>'Surat Online','d'=>'Ajukan permohonan surat 24 jam','url'=>route('layanan.surat'),'c'=>'primary'],
      ['icon'=>'fa-bullhorn','t'=>'Pengaduan','d'=>'Sampaikan keluhan & saran Anda','url'=>route('layanan.pengaduan'),'c'=>'secondary'],
      ['icon'=>'fa-chart-pie','t'=>'APBDes Transparan','d'=>'Lihat data anggaran desa','url'=>route('anggaran'),'c'=>'green'],
      ['icon'=>'fa-magnifying-glass','t'=>'Tracking Surat','d'=>'Cek status permohonan Anda','url'=>route('layanan.tracking'),'c'=>'primary'],
    ]; ?>
    <?php $__currentLoopData = $svc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e($s['url']); ?>" class="card-hover p-5 border border-slate-100 rounded-2xl block group" data-aos="fade-up" data-aos-delay="<?php echo e($i*100); ?>">
      <div class="w-12 h-12 rounded-2xl grid place-items-center group-hover:rotate-12 transition-transform duration-500
        <?php echo e($s['c']==='primary'?'bg-primary-100 text-primary-700':($s['c']==='secondary'?'bg-secondary-100 text-secondary-600':'bg-emerald-100 text-emerald-700')); ?>"><i class="fa-solid <?php echo e($s['icon']); ?> text-xl"></i></div>
      <div class="mt-3 font-bold text-ink-900 group-hover:text-primary-700 transition"><?php echo e($s['t']); ?></div>
      <div class="text-sm text-ink-500"><?php echo e($s['d']); ?></div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 space-y-4" data-aos="fade-up">
    <h2 class="text-2xl flex items-center gap-3"><span class="w-10 h-10 rounded-xl bg-secondary-100 text-secondary-600 grid place-items-center"><i class="fa-solid fa-bell"></i></span> Pengumuman Terbaru</h2>
    <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 card-hover <?php echo e($a->is_pinned?'border-secondary-500':'border-primary-500'); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($i*80); ?>">
        <div class="flex items-center gap-2 text-xs text-ink-500">
          <?php if($a->is_pinned): ?><span class="bg-secondary-400 text-primary-900 font-bold px-2 py-0.5 rounded-full"><i class="fa-solid fa-thumbtack mr-1"></i>PINNED</span><?php endif; ?>
          <span><i class="fa-regular fa-clock mr-1"></i><?php echo e($a->published_at?->translatedFormat('d F Y')); ?></span>
        </div>
        <h3 class="text-lg mt-2 text-primary-800"><?php echo e($a->title); ?></h3>
        <p class="text-sm text-ink-700 mt-1"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($a->body), 220)); ?></p>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-ink-500">Belum ada pengumuman.</div>
    <?php endif; ?>
  </div>
  <div data-aos="fade-up">
    <h2 class="text-2xl flex items-center gap-3"><span class="w-10 h-10 rounded-xl bg-primary-100 text-primary-700 grid place-items-center"><i class="fa-solid fa-calendar-days"></i></span> Agenda</h2>
    <div class="mt-4 space-y-3">
      <?php $__empty_1 = true; $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white p-4 rounded-xl shadow-sm flex gap-4 items-start card-hover" data-aos="fade-left" data-aos-delay="<?php echo e($i*60); ?>">
          <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white rounded-lg p-2 text-center min-w-[60px] shadow-md">
            <div class="text-2xl font-bold"><?php echo e($a->start_at->format('d')); ?></div>
            <div class="text-xs uppercase text-secondary-300"><?php echo e($a->start_at->translatedFormat('M')); ?></div>
          </div>
          <div>
            <div class="font-semibold"><?php echo e($a->title); ?></div>
            <div class="text-xs text-ink-500"><i class="fa-solid fa-clock mr-1"></i><?php echo e($a->start_at->format('H:i')); ?> WIB</div>
            <div class="text-xs text-ink-500"><i class="fa-solid fa-location-dot mr-1"></i><?php echo e($a->location); ?></div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-ink-500 text-sm">Belum ada agenda.</div>
      <?php endif; ?>
    </div>
  </div>
</section>


<section class="bg-white py-16 relative overflow-hidden">
  <div class="blob bg-primary-200 w-96 h-96 -top-32 -right-32 opacity-30"></div>
  <div class="relative max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-end mb-8" data-aos="fade-up">
      <div>
        <span class="text-secondary-600 font-semibold text-sm">📢 INFORMASI TERBARU</span>
        <h2 class="text-3xl sm:text-4xl mt-1">Berita Desa Ciwiru</h2>
        <p class="text-ink-500">Update kegiatan dan pembangunan desa</p>
      </div>
      <a href="<?php echo e(route('berita.index')); ?>" class="text-primary-700 hover:text-primary-900 font-semibold link-anim hidden sm:inline-block">Semua Berita <i class="fa-solid fa-arrow-right ml-1"></i></a>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('berita.show', $p->slug)); ?>" class="block card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group" data-aos="fade-up" data-aos-delay="<?php echo e($i*80); ?>">
          <div class="aspect-video bg-slate-100 overflow-hidden">
            <div class="w-full h-full group-hover:scale-110 transition-transform duration-700" style="background-image: url('https://images.unsplash.com/photo-1568667256549-094345857637?w=800'); background-size:cover; background-position:center;"></div>
          </div>
          <div class="p-5">
            <span class="text-xs bg-primary-100 text-primary-700 font-semibold px-2 py-1 rounded"><?php echo e($p->category->name ?? 'Berita'); ?></span>
            <h3 class="text-lg mt-3 line-clamp-2 group-hover:text-primary-700 transition"><?php echo e($p->title); ?></h3>
            <p class="text-sm text-ink-500 mt-2 line-clamp-2"><?php echo e($p->excerpt); ?></p>
            <div class="text-xs text-ink-500 mt-3 flex justify-between"><span><i class="fa-regular fa-clock mr-1"></i><?php echo e($p->published_at->diffForHumans()); ?></span><span class="text-primary-600"><i class="fa-regular fa-eye mr-1"></i><?php echo e($p->views); ?></span></div>
          </div>
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="flex justify-between items-end mb-8" data-aos="fade-up">
    <div>
      <span class="text-secondary-600 font-semibold text-sm">🏞️ DESTINASI WISATA</span>
      <h2 class="text-3xl sm:text-4xl mt-1">Wisata Desa Ciwiru</h2>
      <p class="text-ink-500">Pesona alam kaki Gunung Ciremai</p>
    </div>
    <a href="<?php echo e(route('wisata.index')); ?>" class="text-primary-700 hover:text-primary-900 font-semibold link-anim hidden sm:inline-block">Lihat Semua <i class="fa-solid fa-arrow-right ml-1"></i></a>
  </div>
  <div class="grid md:grid-cols-3 gap-6">
    <?php $__currentLoopData = $featuredWisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('wisata.show', $w->slug)); ?>" class="card-hover relative rounded-3xl overflow-hidden h-80 block group" data-aos="zoom-in" data-aos-delay="<?php echo e($i*100); ?>">
        <img src="<?php echo e($w->thumbnail); ?>" alt="<?php echo e($w->name); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950/95 via-primary-900/50 to-transparent"></div>
        <div class="absolute top-4 left-4">
          <span class="bg-secondary-400 text-primary-900 text-xs font-bold px-3 py-1 rounded-full"><i class="fa-solid fa-ticket mr-1"></i>Rp <?php echo e(number_format($w->ticket_price,0,',','.')); ?></span>
        </div>
        <div class="absolute bottom-0 p-5 text-white">
          <h3 class="text-xl"><?php echo e($w->name); ?></h3>
          <div class="text-sm text-primary-200 mt-1 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($w->description),100)); ?></div>
          <div class="mt-3 inline-flex items-center text-secondary-400 font-semibold text-sm">Jelajahi <i class="fa-solid fa-arrow-right ml-1 group-hover:translate-x-1 transition"></i></div>
        </div>
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>


<section class="bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-16">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-end mb-8" data-aos="fade-up">
      <div>
        <span class="text-primary-600 font-semibold text-sm">🛍️ PRODUK LOKAL</span>
        <h2 class="text-3xl sm:text-4xl mt-1">UMKM Desa Ciwiru</h2>
        <p class="text-ink-500">Dukung produk lokal warga desa</p>
      </div>
      <a href="<?php echo e(route('umkm.index')); ?>" class="text-primary-700 hover:text-primary-900 font-semibold link-anim hidden sm:inline-block">Semua UMKM <i class="fa-solid fa-arrow-right ml-1"></i></a>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php $__currentLoopData = $featuredUmkm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('umkm.show', $u->slug)); ?>" class="card-hover bg-white rounded-2xl overflow-hidden shadow block group border border-primary-50" data-aos="fade-up" data-aos-delay="<?php echo e($i*80); ?>">
          <div class="aspect-square bg-slate-100 overflow-hidden">
            <div class="w-full h-full group-hover:scale-110 transition duration-700" style="background-image:url('<?php echo e($u->thumbnail); ?>'); background-size:cover; background-position:center;"></div>
          </div>
          <div class="p-5">
            <span class="text-xs bg-secondary-100 text-secondary-700 font-bold px-2 py-1 rounded"><?php echo e($u->category); ?></span>
            <h3 class="text-lg mt-2 group-hover:text-primary-700 transition"><?php echo e($u->name); ?></h3>
            <p class="text-xs text-ink-500 mt-1"><i class="fa-solid fa-user mr-1"></i><?php echo e($u->owner); ?></p>
          </div>
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-12">
  <div class="gradient-hero rounded-3xl p-10 sm:p-14 text-white relative overflow-hidden" data-aos="zoom-in">
    <div class="absolute inset-0 opacity-20" style="background:radial-gradient(circle at 30% 30%, rgba(250,204,21,.4), transparent 50%), radial-gradient(circle at 70% 70%, rgba(96,165,250,.4), transparent 50%);"></div>
    <div class="relative grid lg:grid-cols-2 gap-6 items-center">
      <div>
        <h2 class="text-3xl sm:text-4xl">Butuh Surat Resmi dari Desa?</h2>
        <p class="text-primary-100 mt-3 max-w-xl">Ajukan permohonan secara online dari rumah. Kami akan memproses dalam 1×24 jam pada hari kerja, dan Anda dapat mengecek statusnya kapan saja melalui nomor tiket.</p>
      </div>
      <div class="flex flex-wrap gap-3 lg:justify-end">
        <a href="<?php echo e(route('layanan.surat')); ?>" class="bg-secondary-400 hover:bg-secondary-500 text-primary-900 font-bold px-6 py-3 rounded-full btn-shine transition shadow-lg"><i class="fa-solid fa-paper-plane mr-2"></i>Ajukan Surat</a>
        <a href="<?php echo e(route('layanan.tracking')); ?>" class="glass hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-full transition"><i class="fa-solid fa-magnifying-glass mr-2"></i>Tracking</a>
      </div>
    </div>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="text-center mb-8" data-aos="fade-up">
    <span class="text-secondary-600 font-semibold text-sm">📍 LOKASI</span>
    <h2 class="text-3xl sm:text-4xl mt-1">Peta Desa Ciwiru</h2>
    <p class="text-ink-500">Kec. Pasawahan, Kab. Kuningan, Jawa Barat</p>
  </div>
  <div id="map-home" class="h-96 rounded-3xl overflow-hidden shadow-2xl border-4 border-white" data-aos="zoom-in"></div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
  const map = L.map('map-home').setView([-6.7961, 108.4411], 14);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'&copy; OpenStreetMap'}).addTo(map);
  const blueIcon = L.divIcon({className:'',html:'<div style="width:36px;height:36px;border-radius:50%;background:#1e40af;border:4px solid #facc15;box-shadow:0 4px 12px rgba(0,0,0,.3);display:grid;place-items:center;color:#fff;font-weight:bold;font-size:14px;">DC</div>',iconSize:[36,36],iconAnchor:[18,36]});
  L.marker([-6.7961, 108.4411], {icon: blueIcon}).addTo(map).bindPopup('<b>Kantor Desa Ciwiru</b><br>Kec. Pasawahan, Kab. Kuningan').openPopup();
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/public/home.blade.php ENDPATH**/ ?>