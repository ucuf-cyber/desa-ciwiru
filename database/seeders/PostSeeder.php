<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::where('role','admin')->first();
        $cats = PostCategory::pluck('id','slug');

        $posts = [
            [
                'title' => 'Pelantikan Perangkat Desa Ciwiru Periode 2024',
                'category' => 'berita-desa',
                'excerpt' => 'Pemerintah Desa Ciwiru menggelar pelantikan dan pengambilan sumpah jabatan perangkat desa baru.',
                'body' => "<p>Pemerintah Desa Ciwiru, Kecamatan Pasawahan, Kabupaten Kuningan menggelar acara pelantikan dan pengambilan sumpah jabatan perangkat desa pada Maret 2024. Acara ini dihadiri oleh Kepala Desa Ciwiru, Bapak Diani Rahman, SE, beserta jajaran muspika kecamatan.</p><p>Pelantikan ini bertujuan untuk memperkuat struktur pemerintahan desa agar pelayanan kepada masyarakat semakin optimal. Perangkat desa yang dilantik berkomitmen untuk bekerja secara profesional, transparan, dan akuntabel demi kemajuan Desa Ciwiru.</p><p>Kepala Desa dalam sambutannya menekankan pentingnya digitalisasi pelayanan desa serta peningkatan kapasitas perangkat dalam menghadapi tantangan zaman.</p>",
                'thumbnail' => 'img/posts/pelantikan.jpg',
            ],
            [
                'title' => 'Pembangunan Drainase Dusun Sukasari Telah Rampung',
                'category' => 'pembangunan',
                'excerpt' => 'Drainase sepanjang 220 meter di Dusun Sukasari telah selesai dikerjakan menggunakan Dana Desa 2024.',
                'body' => "<p>Pembangunan drainase di Dusun Sukasari, Desa Ciwiru sepanjang 220 meter telah rampung dikerjakan. Proyek ini didanai oleh Dana Desa (DD) Tahun Anggaran 2024 dan ditargetkan dapat menyelesaikan masalah genangan air di pemukiman warga ketika musim hujan.</p><p>Warga menyambut antusias hasil pembangunan ini. Selain memperlancar aliran air, infrastruktur baru ini juga memperindah lingkungan dusun.</p><p>Pemerintah Desa Ciwiru terus berkomitmen melakukan pembangunan secara merata di setiap dusun, dengan tetap mengedepankan asas transparansi dan partisipasi masyarakat.</p>",
                'thumbnail' => 'img/posts/drainase.jpg',
            ],
            [
                'title' => 'Panen Raya Padi Sawah Tadah Hujan di Ciwiru',
                'category' => 'pertanian',
                'excerpt' => 'Petani Desa Ciwiru menggelar panen raya padi sawah dengan hasil yang menggembirakan tahun ini.',
                'body' => "<p>Para petani Desa Ciwiru, Kecamatan Pasawahan, Kabupaten Kuningan menggelar panen raya padi sawah pada awal musim panen ini. Cuaca yang mendukung serta penerapan pola tanam yang baik menghasilkan panen yang melimpah.</p><p>Kepala Desa bersama Dinas Pertanian Kabupaten Kuningan turut hadir dalam acara panen raya tersebut sebagai bentuk apresiasi terhadap para petani desa.</p><p>Diharapkan hasil panen ini dapat meningkatkan kesejahteraan petani serta memperkuat ketahanan pangan di wilayah Kuningan dan sekitarnya.</p>",
                'thumbnail' => 'img/posts/panen.jpg',
            ],
            [
                'title' => 'Posyandu Balita Desa Ciwiru Aktif Setiap Bulan',
                'category' => 'kesehatan',
                'excerpt' => 'Posyandu di setiap dusun aktif memantau tumbuh kembang balita warga Desa Ciwiru.',
                'body' => "<p>Pelayanan Posyandu balita di Desa Ciwiru aktif diselenggarakan setiap bulan di masing-masing dusun. Kader posyandu bersama bidan desa rutin melakukan penimbangan berat badan, pengukuran tinggi badan, dan pemberian vitamin kepada balita.</p><p>Kegiatan ini merupakan upaya pemerintah desa dalam menekan angka stunting dan memastikan kesehatan tumbuh kembang anak-anak Desa Ciwiru.</p>",
                'thumbnail' => 'img/posts/posyandu.jpg',
            ],
            [
                'title' => 'Pengembangan Wisata Kaki Gunung Ciremai Ciwiru',
                'category' => 'kegiatan',
                'excerpt' => 'Desa Ciwiru terus mengembangkan potensi wisata alam di kawasan kaki Gunung Ciremai.',
                'body' => "<p>Berkat lokasinya yang berada di kaki Gunung Ciremai, Desa Ciwiru memiliki potensi wisata alam yang luar biasa. Pemerintah Desa bersama Pokdarwis aktif mengembangkan paket wisata alam, edukasi peternakan, serta wisata kuliner khas desa.</p><p>Saat ini, jalur trekking, agrowisata kopi, serta camping ground sedang disiapkan agar dapat menarik wisatawan dari Kuningan, Cirebon, dan kota-kota sekitarnya.</p>",
                'thumbnail' => 'img/posts/wisata.jpg',
            ],
            [
                'title' => 'Pemerintah Desa Salurkan BLT-DD Tahap II',
                'category' => 'sosial-kemasyarakatan',
                'excerpt' => 'Penyaluran Bantuan Langsung Tunai Dana Desa tahap kedua kepada Keluarga Penerima Manfaat.',
                'body' => "<p>Pemerintah Desa Ciwiru kembali menyalurkan Bantuan Langsung Tunai Dana Desa (BLT-DD) tahap kedua kepada Keluarga Penerima Manfaat (KPM). Penyaluran dilakukan di kantor desa dengan disaksikan oleh Babinsa, Babinkamtibmas, dan perwakilan kecamatan.</p><p>Bantuan ini diharapkan dapat meringankan beban ekonomi keluarga prasejahtera di Desa Ciwiru.</p>",
                'thumbnail' => 'img/posts/blt.jpg',
            ],
            [
                'title' => 'Musrenbangdes 2025 Susun Prioritas Pembangunan',
                'category' => 'kegiatan',
                'excerpt' => 'Musyawarah Perencanaan Pembangunan Desa Ciwiru 2025 merumuskan prioritas pembangunan tahun berikutnya.',
                'body' => "<p>Pemerintah Desa Ciwiru menggelar Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) untuk merumuskan prioritas pembangunan tahun 2025. Acara dihadiri oleh BPD, LPM, Karang Taruna, PKK, tokoh masyarakat, serta perwakilan setiap dusun.</p><p>Hasil musyawarah menetapkan prioritas pembangunan pada bidang infrastruktur jalan, pengembangan UMKM, dan peningkatan pelayanan publik berbasis digital.</p>",
                'thumbnail' => 'img/posts/musrenbang.jpg',
            ],
            [
                'title' => 'Pelatihan Digital Marketing untuk Pelaku UMKM',
                'category' => 'pendidikan',
                'excerpt' => 'Pelaku UMKM Desa Ciwiru mengikuti pelatihan digital marketing dan penjualan online.',
                'body' => "<p>Pemerintah Desa Ciwiru bekerja sama dengan Dinas Koperasi dan UKM menyelenggarakan pelatihan digital marketing bagi pelaku UMKM. Materi yang diberikan mencakup pengelolaan media sosial, penjualan melalui marketplace, dan fotografi produk.</p><p>Pelatihan ini diikuti puluhan pelaku UMKM dari berbagai bidang seperti makanan ringan, kerajinan, dan pertanian olahan.</p>",
                'thumbnail' => 'img/posts/pelatihan.jpg',
            ],
        ];

        foreach ($posts as $i => $p) {
            Post::create([
                'title' => $p['title'],
                'slug' => Str::slug($p['title']),
                'category_id' => $cats[$p['category']] ?? null,
                'author_id' => $author?->id,
                'thumbnail' => $p['thumbnail'],
                'body' => $p['body'],
                'excerpt' => $p['excerpt'],
                'tags' => 'ciwiru, desa, kuningan',
                'meta_title' => $p['title'] . ' | Desa Ciwiru',
                'meta_description' => $p['excerpt'],
                'status' => 'published',
                'views' => random_int(50, 800),
                'published_at' => now()->subDays($i * 7 + 2),
            ]);
        }
    }
}
