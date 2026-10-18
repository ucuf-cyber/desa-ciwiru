<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ApbdesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

// PUBLIC
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/kontak', [HomeController::class,'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class,'kirimKontak'])->name('kontak.send');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [ProfileController::class,'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfileController::class,'visiMisi'])->name('visi-misi');
    Route::get('/geografis', [ProfileController::class,'geografis'])->name('geografis');
    Route::get('/demografis', [ProfileController::class,'demografis'])->name('demografis');
});
Route::get('/organisasi', [ProfileController::class,'organisasi'])->name('organisasi');

Route::get('/berita', [NewsController::class,'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class,'show'])->name('berita.show');

Route::get('/galeri', [GalleryController::class,'index'])->name('galeri.index');
Route::get('/galeri/{slug}', [GalleryController::class,'show'])->name('galeri.show');

Route::get('/wisata', [WisataController::class,'index'])->name('wisata.index');
Route::get('/wisata/{slug}', [WisataController::class,'show'])->name('wisata.show');

Route::get('/umkm', [UmkmController::class,'index'])->name('umkm.index');
Route::get('/umkm/{slug}', [UmkmController::class,'show'])->name('umkm.show');

Route::get('/anggaran', [ApbdesController::class,'index'])->name('anggaran');
Route::get('/statistik', [StatistikController::class,'index'])->name('statistik');

Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/surat', [LayananController::class,'suratForm'])->name('surat');
    Route::post('/surat', [LayananController::class,'suratStore'])->name('surat.store');
    Route::get('/pengaduan', [LayananController::class,'pengaduanForm'])->name('pengaduan');
    Route::post('/pengaduan', [LayananController::class,'pengaduanStore'])->name('pengaduan.store');
    Route::get('/tracking', [LayananController::class,'tracking'])->name('tracking');
});

// AUTH
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class,'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('login.post');
});
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth')->name('logout');

// ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth','role:super_admin,admin,operator,kepala_desa'])->group(function () {
    Route::get('/', [Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('posts', Admin\PostController::class);
    Route::resource('wisata', Admin\WisataController::class)->parameters(['wisata' => 'wisatum']);
    Route::resource('umkm', Admin\UmkmController::class);
    Route::resource('apbdes', Admin\ApbdesController::class)->parameters(['apbdes' => 'apbde']);
    Route::resource('officials', Admin\OfficialController::class);

    Route::resource('gallery', Admin\GalleryController::class)->parameters(['gallery'=>'album'])->except(['edit','update']);
    Route::post('gallery/{album}/items', [Admin\GalleryController::class,'addItems'])->name('gallery.items');
    Route::delete('gallery/items/{item}', [Admin\GalleryController::class,'destroyItem'])->name('gallery.items.destroy');

    Route::get('surat', [Admin\SuratController::class,'index'])->name('surat.index');
    Route::get('surat/{surat}', [Admin\SuratController::class,'show'])->name('surat.show');
    Route::put('surat/{surat}', [Admin\SuratController::class,'update'])->name('surat.update');
    Route::get('surat/{surat}/pdf', [Admin\SuratController::class,'pdf'])->name('surat.pdf');

    Route::get('complaints', [Admin\ComplaintController::class,'index'])->name('complaints.index');
    Route::get('complaints/{complaint}', [Admin\ComplaintController::class,'show'])->name('complaints.show');
    Route::put('complaints/{complaint}', [Admin\ComplaintController::class,'update'])->name('complaints.update');

    Route::resource('users', Admin\UserController::class);
    Route::get('settings', [Admin\SettingController::class,'index'])->name('settings.index');
    Route::put('settings', [Admin\SettingController::class,'update'])->name('settings.update');
});
