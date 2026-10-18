<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Admin {{ $siteName ?? 'Desa Ciwiru' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{
      fontFamily:{sans:['Inter','sans-serif'],heading:['Plus Jakarta Sans','sans-serif']},
      colors:{primary:{50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a',950:'#172554'},
              secondary:{400:'#facc15',500:'#eab308',600:'#ca8a04'}},
      animation:{'fade-in':'fadeIn .4s ease', 'slide-in':'slideIn .35s ease'},
      keyframes:{fadeIn:{from:{opacity:'0'},to:{opacity:'1'}}, slideIn:{from:{transform:'translateX(-10px)',opacity:'0'},to:{transform:'translateX(0)',opacity:'1'}}}
    }}}</script>
    <style>
      body{font-family:'Inter',sans-serif;background:#f1f5f9;}
      h1,h2,h3,h4{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;letter-spacing:-.01em}
      .menu-item{transition: all .2s; border-left: 3px solid transparent;}
      .menu-item:hover{background: rgba(96,165,250,.1); border-left-color:#facc15; padding-left: 22px;}
      .menu-active{background: rgba(96,165,250,.2); border-left-color:#facc15;}
      ::-webkit-scrollbar{width:8px;height:8px;}::-webkit-scrollbar-track{background:#f1f5f9;}::-webkit-scrollbar-thumb{background:#3b82f6;border-radius:8px;}
    </style>
</head>
<body class="text-slate-900" x-data="{sidebar:true}">
  <div class="min-h-screen flex">
    <aside :class="sidebar?'w-64':'w-20'" class="bg-gradient-to-b from-primary-900 to-primary-950 text-primary-50 transition-all duration-300 flex flex-col shadow-2xl">
      <div class="p-5 flex items-center gap-3 border-b border-primary-800/60">
        <div class="w-10 h-10 rounded-full bg-white overflow-hidden ring-2 ring-secondary-400">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
        </div>
        <div x-show="sidebar" x-transition>
          <div class="font-bold leading-tight">Desa Ciwiru</div>
          <div class="text-xs text-secondary-300 italic">Admin Panel</div>
        </div>
      </div>
      <nav class="flex-1 py-4 space-y-1 text-sm overflow-y-auto">
        @php $r = request()->route()?->getName(); @endphp
        @php $links = [
          ['admin.dashboard','fa-gauge-high','Dashboard',null],
          ['admin.posts.index','fa-newspaper','Berita','admin.posts'],
          ['admin.gallery.index','fa-images','Galeri','admin.gallery'],
          ['admin.wisata.index','fa-mountain-sun','Wisata','admin.wisata'],
          ['admin.umkm.index','fa-store','UMKM','admin.umkm'],
          ['admin.apbdes.index','fa-coins','APBDes','admin.apbdes'],
          ['admin.officials.index','fa-users-line','Perangkat Desa','admin.officials'],
        ]; @endphp
        @foreach($links as $l)
          <a href="{{ route($l[0]) }}" class="menu-item flex items-center gap-3 px-5 py-2.5 {{ ($l[3] && str_starts_with($r ?? '',$l[3])) || $r===$l[0] ? 'menu-active':'' }}">
            <i class="fa-solid {{ $l[1] }} w-5 text-secondary-400"></i><span x-show="sidebar" x-transition>{{ $l[2] }}</span>
          </a>
        @endforeach
        <div class="px-5 pt-4 pb-1 text-secondary-300/80 text-xs uppercase tracking-wider font-semibold" x-show="sidebar" x-transition>Layanan</div>
        <a href="{{ route('admin.surat.index') }}" class="menu-item flex items-center gap-3 px-5 py-2.5 {{ str_starts_with($r ?? '','admin.surat')?'menu-active':'' }}"><i class="fa-solid fa-file-signature w-5 text-secondary-400"></i><span x-show="sidebar" x-transition>Surat Online</span></a>
        <a href="{{ route('admin.complaints.index') }}" class="menu-item flex items-center gap-3 px-5 py-2.5 {{ str_starts_with($r ?? '','admin.complaints')?'menu-active':'' }}"><i class="fa-solid fa-bullhorn w-5 text-secondary-400"></i><span x-show="sidebar" x-transition>Pengaduan</span></a>
        <div class="px-5 pt-4 pb-1 text-secondary-300/80 text-xs uppercase tracking-wider font-semibold" x-show="sidebar" x-transition>Sistem</div>
        <a href="{{ route('admin.users.index') }}" class="menu-item flex items-center gap-3 px-5 py-2.5 {{ str_starts_with($r ?? '','admin.users')?'menu-active':'' }}"><i class="fa-solid fa-user-gear w-5 text-secondary-400"></i><span x-show="sidebar" x-transition>Pengguna</span></a>
        <a href="{{ route('admin.settings.index') }}" class="menu-item flex items-center gap-3 px-5 py-2.5 {{ str_starts_with($r ?? '','admin.settings')?'menu-active':'' }}"><i class="fa-solid fa-gear w-5 text-secondary-400"></i><span x-show="sidebar" x-transition>Pengaturan</span></a>
      </nav>
      <div class="p-4 text-xs text-primary-300/70 border-t border-primary-800/60" x-show="sidebar" x-transition>© {{ date('Y') }} Desa Ciwiru</div>
    </aside>

    <div class="flex-1 flex flex-col">
      <header class="bg-white shadow-sm flex items-center justify-between px-6 py-3 sticky top-0 z-10">
        <button @click="sidebar=!sidebar" class="text-xl text-primary-700 hover:text-primary-900"><i class="fa-solid fa-bars"></i></button>
        <div class="flex items-center gap-3">
          <a href="{{ route('home') }}" target="_blank" class="text-sm text-primary-600 hover:text-primary-800 hover:underline"><i class="fa-solid fa-arrow-up-right-from-square mr-1"></i>Lihat Website</a>
          <div class="text-sm text-right">
            <div class="font-semibold">{{ auth()->user()->name }}</div>
            <div class="text-xs text-slate-500">{{ ucwords(str_replace('_',' ', auth()->user()->role)) }}</div>
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-800 text-white grid place-items-center font-bold">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
          <form action="{{ route('logout') }}" method="POST">@csrf
            <button class="ml-2 bg-red-500 hover:bg-red-600 transition text-white px-3 py-2 rounded-lg text-sm" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></button>
          </form>
        </div>
      </header>
      @if(session('success'))<div class="m-6 p-3 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded animate-fade-in"><i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}</div>@endif
      @if(session('error'))<div class="m-6 p-3 bg-red-50 border-l-4 border-red-500 text-red-800 rounded animate-fade-in"><i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('error') }}</div>@endif
      @if($errors->any())<div class="m-6 p-3 bg-red-50 border-l-4 border-red-500 text-red-800 rounded animate-fade-in"><ul class="list-disc ml-5">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>@endif
      <main class="p-6 flex-1 animate-fade-in">@yield('content')</main>
    </div>
  </div>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @stack('scripts')
</body>
</html>
