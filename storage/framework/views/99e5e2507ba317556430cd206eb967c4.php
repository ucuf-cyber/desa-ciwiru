<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Beranda'); ?> | <?php echo e($siteName ?? 'Desa Ciwiru'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Website Resmi Pemerintah Desa Ciwiru, Kecamatan Pasawahan, Kabupaten Kuningan, Jawa Barat.'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('img/logo.png')); ?>" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: { extend: {
          fontFamily: { 'sans':['Inter','sans-serif'], 'heading':['Plus Jakarta Sans','sans-serif'] },
          colors: {
            primary: { 50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a',950:'#172554'},
            secondary: { 50:'#fefce8',100:'#fef9c3',200:'#fef08a',300:'#fde047',400:'#facc15',500:'#eab308',600:'#ca8a04',700:'#a16207'},
            accent: { green: '#16a34a', leaf: '#22c55e' },
            ink: { 900:'#0b1220', 700:'#1f2937', 500:'#475569', 300:'#cbd5e1' }
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'float-slow': 'float 10s ease-in-out infinite',
            'pulse-soft': 'pulseSoft 3s ease-in-out infinite',
            'shine': 'shine 3s linear infinite',
            'bounce-slow': 'bounceSlow 3s ease-in-out infinite',
            'spin-slow': 'spin 20s linear infinite',
            'fade-in-up': 'fadeInUp .8s ease forwards',
            'gradient-x': 'gradientX 8s ease infinite',
          },
          keyframes: {
            float: {'0%,100%':{transform:'translateY(0)'},'50%':{transform:'translateY(-12px)'}},
            pulseSoft: {'0%,100%':{opacity:'1'},'50%':{opacity:'.7'}},
            shine: {'0%':{backgroundPosition:'-200% 0'},'100%':{backgroundPosition:'200% 0'}},
            bounceSlow: {'0%,100%':{transform:'translateY(0)'},'50%':{transform:'translateY(-6px)'}},
            fadeInUp: {'0%':{opacity:'0',transform:'translateY(20px)'},'100%':{opacity:'1',transform:'translateY(0)'}},
            gradientX: {'0%,100%':{backgroundPosition:'0% 50%'},'50%':{backgroundPosition:'100% 50%'}},
          }
        }}
      }
    </script>
    <style>
      body { font-family: 'Inter', sans-serif; color:#0b1220; background:#f8fafc; }
      h1,h2,h3,h4,h5,h6 { font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; letter-spacing:-0.01em; }
      .gradient-hero { background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 40%, #1d4ed8 70%, #2563eb 100%); }
      .gradient-yellow { background: linear-gradient(90deg, #facc15, #eab308); }
      .text-gradient { background: linear-gradient(90deg,#facc15,#fde047,#facc15); -webkit-background-clip:text; background-clip:text; color:transparent; background-size: 200% 100%; animation: shine 3s linear infinite; }
      .text-gradient-blue { background: linear-gradient(90deg,#60a5fa,#3b82f6,#1d4ed8); -webkit-background-clip:text; background-clip:text; color:transparent; }
      .marquee { overflow: hidden; }
      .marquee-inner { display:inline-block; white-space:nowrap; animation: marquee 40s linear infinite; }
      @keyframes marquee { 0%{transform:translateX(0%)} 100%{transform:translateX(-50%)} }
      .prose-content p { margin-bottom: 1rem; line-height: 1.75; }
      .prose-content h2 { font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: .75rem; }
      .prose-content img { border-radius: .5rem; margin: 1rem 0; }
      .prose-content ul { list-style: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
      .prose-content ol { list-style: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
      .prose-content a { color:#2563eb; text-decoration:underline; }

      /* CARD HOVER */
      .card-hover { transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s; will-change: transform; }
      .card-hover:hover { transform: translateY(-6px) scale(1.01); box-shadow: 0 25px 50px -12px rgba(30,64,175,.25); }

      /* SHINE BUTTON */
      .btn-shine { position:relative; overflow:hidden; isolation:isolate; }
      .btn-shine::before { content:''; position:absolute; inset:0; background:linear-gradient(90deg, transparent, rgba(255,255,255,.35), transparent); transform:translateX(-100%); transition: transform .8s; }
      .btn-shine:hover::before { transform: translateX(100%); }

      /* RIPPLE LINK underline */
      .link-anim { position:relative; }
      .link-anim::after { content:''; position:absolute; left:0; right:0; bottom:-2px; height:2px; background:#facc15; transform:scaleX(0); transform-origin:right; transition: transform .35s ease; }
      .link-anim:hover::after { transform:scaleX(1); transform-origin:left; }

      /* GLASS */
      .glass { background: rgba(255,255,255,.08); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border:1px solid rgba(255,255,255,.15); }

      /* BLOB BG */
      .blob { position:absolute; filter: blur(80px); opacity:.5; border-radius:50%; pointer-events:none; }

      /* LEAFLET */
      .leaflet-container { z-index: 1; }

      /* SCROLLBAR */
      ::-webkit-scrollbar { width: 10px; height:10px; }
      ::-webkit-scrollbar-track { background: #f1f5f9; }
      ::-webkit-scrollbar-thumb { background: linear-gradient(180deg,#3b82f6,#1e40af); border-radius: 10px; }

      /* Scroll Reveal section */
      [data-aos] { transition-property: transform, opacity; }

      /* Logo wrapper */
      .logo-ring { box-shadow: 0 0 0 4px rgba(250,204,21,.35), 0 0 0 8px rgba(255,255,255,.6); }
    </style>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="antialiased">

  
  <div class="bg-primary-900 text-primary-100 text-xs">
    <div class="max-w-7xl mx-auto px-4 py-2 flex flex-wrap items-center justify-between gap-2">
      <div class="flex items-center gap-4">
        <span class="animate-pulse-soft"><i class="fa-solid fa-phone mr-1 text-secondary-400"></i> <?php echo e($sitePhone ?? ''); ?></span>
        <span class="hidden sm:inline"><i class="fa-solid fa-envelope mr-1 text-secondary-400"></i> <?php echo e($siteEmail ?? ''); ?></span>
      </div>
      <div class="flex items-center gap-3">
        <a href="#" class="hover:text-secondary-400 transition"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" class="hover:text-secondary-400 transition"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="hover:text-secondary-400 transition"><i class="fa-brands fa-youtube"></i></a>
        <?php if(auth()->guard()->check()): ?>
          <a href="<?php echo e(route('admin.dashboard')); ?>" class="bg-secondary-400 hover:bg-secondary-500 transition px-3 py-1 rounded-full text-primary-900 font-semibold">Dashboard</a>
        <?php else: ?>
          <a href="<?php echo e(route('login')); ?>" class="hover:text-secondary-400 transition link-anim">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  
  <header class="bg-white/95 backdrop-blur shadow-sm sticky top-0 z-40 border-b border-primary-100">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
        <div class="w-14 h-14 rounded-full bg-white logo-ring overflow-hidden flex-shrink-0 group-hover:rotate-6 transition-transform duration-500">
          <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Desa Ciwiru" class="w-full h-full object-contain">
        </div>
        <div>
          <div class="text-base sm:text-lg font-bold text-primary-800 leading-tight"><?php echo e($siteName); ?></div>
          <div class="text-xs text-ink-500 italic">Tanjeur Winangun Kerta Wibawa</div>
        </div>
      </a>
      <nav class="hidden lg:flex items-center gap-1 text-sm font-medium text-ink-700">
        <a href="<?php echo e(route('home')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">Beranda</a>
        <div class="relative group">
          <button class="px-3 py-2 hover:text-primary-700">Profil <i class="fa-solid fa-chevron-down text-xs ml-1 group-hover:rotate-180 transition"></i></button>
          <div class="absolute left-0 top-full pt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 -translate-y-2 group-hover:translate-y-0">
            <div class="bg-white shadow-2xl rounded-xl py-2 border border-primary-50">
              <a href="<?php echo e(route('profil.sejarah')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700">Sejarah Desa</a>
              <a href="<?php echo e(route('profil.visi-misi')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700">Visi & Misi</a>
              <a href="<?php echo e(route('profil.geografis')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700">Geografis</a>
              <a href="<?php echo e(route('profil.demografis')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700">Demografis</a>
              <a href="<?php echo e(route('organisasi')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700">Struktur Organisasi</a>
            </div>
          </div>
        </div>
        <a href="<?php echo e(route('berita.index')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">Berita</a>
        <a href="<?php echo e(route('wisata.index')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">Wisata</a>
        <a href="<?php echo e(route('umkm.index')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">UMKM</a>
        <a href="<?php echo e(route('galeri.index')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">Galeri</a>
        <a href="<?php echo e(route('anggaran')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">APBDes</a>
        <a href="<?php echo e(route('statistik')); ?>" class="px-3 py-2 link-anim hover:text-primary-700">Statistik</a>
        <div class="relative group">
          <button class="px-3 py-2 hover:text-primary-700">Layanan <i class="fa-solid fa-chevron-down text-xs ml-1 group-hover:rotate-180 transition"></i></button>
          <div class="absolute right-0 top-full pt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all -translate-y-2 group-hover:translate-y-0">
            <div class="bg-white shadow-2xl rounded-xl py-2 border border-primary-50">
              <a href="<?php echo e(route('layanan.surat')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700"><i class="fa-solid fa-file-pen text-primary-500 mr-2"></i>Surat Online</a>
              <a href="<?php echo e(route('layanan.pengaduan')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700"><i class="fa-solid fa-bullhorn text-secondary-500 mr-2"></i>Pengaduan</a>
              <a href="<?php echo e(route('layanan.tracking')); ?>" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-700"><i class="fa-solid fa-magnifying-glass text-accent-leaf mr-2"></i>Tracking Status</a>
            </div>
          </div>
        </div>
        <a href="<?php echo e(route('kontak')); ?>" class="ml-2 bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-full btn-shine font-semibold transition">Kontak</a>
      </nav>
      <button class="lg:hidden text-2xl text-primary-700" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"><i class="fa-solid fa-bars"></i></button>
    </div>
    <div id="mobile-menu" class="hidden lg:hidden border-t bg-white">
      <div class="px-4 py-3 space-y-1 text-sm">
        <a href="<?php echo e(route('home')); ?>" class="block py-2 hover:text-primary-700">Beranda</a>
        <a href="<?php echo e(route('profil.sejarah')); ?>" class="block py-2 hover:text-primary-700">Profil</a>
        <a href="<?php echo e(route('berita.index')); ?>" class="block py-2 hover:text-primary-700">Berita</a>
        <a href="<?php echo e(route('wisata.index')); ?>" class="block py-2 hover:text-primary-700">Wisata</a>
        <a href="<?php echo e(route('umkm.index')); ?>" class="block py-2 hover:text-primary-700">UMKM</a>
        <a href="<?php echo e(route('galeri.index')); ?>" class="block py-2 hover:text-primary-700">Galeri</a>
        <a href="<?php echo e(route('anggaran')); ?>" class="block py-2 hover:text-primary-700">APBDes</a>
        <a href="<?php echo e(route('statistik')); ?>" class="block py-2 hover:text-primary-700">Statistik</a>
        <a href="<?php echo e(route('layanan.surat')); ?>" class="block py-2 hover:text-primary-700">Surat Online</a>
        <a href="<?php echo e(route('layanan.pengaduan')); ?>" class="block py-2 hover:text-primary-700">Pengaduan</a>
        <a href="<?php echo e(route('kontak')); ?>" class="block py-2 hover:text-primary-700">Kontak</a>
      </div>
    </div>
  </header>

  
  <?php if(!empty($runningTexts) && $runningTexts->count()): ?>
  <div class="gradient-yellow text-primary-900 py-2 marquee shadow-inner">
    <div class="marquee-inner font-semibold">
      <?php $__currentLoopData = $runningTexts->concat($runningTexts); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="mx-8 text-sm"><i class="fa-solid fa-bullhorn mr-2"></i><?php echo e($rt->text); ?></span>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <?php endif; ?>

  
  <?php if(session('success')): ?>
    <div class="max-w-7xl mx-auto mt-4 px-4">
      <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-lg animate-fade-in-up">
        <i class="fa-solid fa-circle-check mr-2"></i><?php echo e(session('success')); ?>

      </div>
    </div>
  <?php endif; ?>
  <?php if(session('error')): ?>
    <div class="max-w-7xl mx-auto mt-4 px-4">
      <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg animate-fade-in-up">
        <i class="fa-solid fa-triangle-exclamation mr-2"></i><?php echo e(session('error')); ?>

      </div>
    </div>
  <?php endif; ?>

  <main>
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  
  <footer class="relative bg-primary-950 text-primary-100 mt-16 overflow-hidden">
    <div class="blob bg-primary-600 w-96 h-96 -top-32 -left-32"></div>
    <div class="blob bg-secondary-400 w-72 h-72 bottom-0 right-0 opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-14 grid md:grid-cols-4 gap-8">
      <div>
        <div class="flex items-center gap-3 mb-3">
          <div class="w-14 h-14 rounded-full bg-white logo-ring overflow-hidden">
            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="w-full h-full object-contain">
          </div>
          <div>
            <div class="text-white font-bold text-lg"><?php echo e($siteName); ?></div>
            <div class="text-xs text-secondary-300 italic">Tanjeur Winangun Kerta Wibawa</div>
          </div>
        </div>
        <p class="text-sm"><?php echo e($siteTagline ?? ''); ?></p>
      </div>
      <div>
        <h4 class="text-white mb-3 font-semibold">Tautan</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="<?php echo e(route('profil.sejarah')); ?>" class="hover:text-secondary-400 link-anim">Profil Desa</a></li>
          <li><a href="<?php echo e(route('berita.index')); ?>" class="hover:text-secondary-400 link-anim">Berita</a></li>
          <li><a href="<?php echo e(route('anggaran')); ?>" class="hover:text-secondary-400 link-anim">Transparansi APBDes</a></li>
          <li><a href="<?php echo e(route('statistik')); ?>" class="hover:text-secondary-400 link-anim">Statistik Desa</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-white mb-3 font-semibold">Layanan</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="<?php echo e(route('layanan.surat')); ?>" class="hover:text-secondary-400 link-anim">Surat Online</a></li>
          <li><a href="<?php echo e(route('layanan.pengaduan')); ?>" class="hover:text-secondary-400 link-anim">Pengaduan</a></li>
          <li><a href="<?php echo e(route('layanan.tracking')); ?>" class="hover:text-secondary-400 link-anim">Cek Status</a></li>
          <li><a href="<?php echo e(route('umkm.index')); ?>" class="hover:text-secondary-400 link-anim">Direktori UMKM</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-white mb-3 font-semibold">Kontak</h4>
        <ul class="space-y-2 text-sm">
          <li><i class="fa-solid fa-location-dot mr-2 text-secondary-400"></i><?php echo e($siteAddress); ?></li>
          <li><i class="fa-solid fa-phone mr-2 text-secondary-400"></i><?php echo e($sitePhone); ?></li>
          <li><i class="fa-solid fa-envelope mr-2 text-secondary-400"></i><?php echo e($siteEmail); ?></li>
        </ul>
      </div>
    </div>
    <div class="relative border-t border-primary-800">
      <div class="max-w-7xl mx-auto px-4 py-4 text-sm flex flex-wrap justify-between gap-2">
        <span>© <?php echo e(date('Y')); ?> <?php echo e($siteName); ?>. Hak Cipta Dilindungi.</span>
        <span class="text-secondary-300">Dibuat Oleh Rakyat untuk Warga Desa Ciwiru</span>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    AOS.init({duration:800, once:true, offset: 60, easing:'ease-out-cubic'});
    // Smooth scroll behaviour for in-page links
    document.querySelectorAll('a[href^="#"]').forEach(a => a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({behavior:'smooth', block:'start'}); }
    }));
  </script>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/layouts/app.blade.php ENDPATH**/ ?>