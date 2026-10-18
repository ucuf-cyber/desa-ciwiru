<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Desa Ciwiru',
            'site_tagline' => 'Desa Berdaya, Maju, dan Sejahtera di Kaki Gunung Ciremai',
            'site_address' => 'Jl. Raya Desa Ciwiru No. 01, Kec. Pasawahan, Kab. Kuningan, Jawa Barat 45559',
            'site_phone' => '+62 822-0000-0000',
            'site_email' => 'info@desa-ciwiru.id',
            'site_facebook' => 'https://www.facebook.com/ciwirupasawahan',
            'site_instagram' => 'https://www.instagram.com/desa.ciwiru',
            'site_lat' => '-6.7961',
            'site_lng' => '108.4411',
            'kepala_desa' => 'Diani Rahman, SE',
            'sekretaris_desa' => 'H. Asep Saepudin',
            'visi' => 'Terwujudnya Desa Ciwiru yang Maju, Mandiri, dan Sejahtera Berbasis Pertanian, Peternakan, dan Pariwisata yang Berlandaskan Iman dan Taqwa.',
            'misi' => "1. Meningkatkan kualitas pelayanan publik berbasis digital dan transparan.\n2. Mengembangkan potensi pertanian, peternakan, dan UMKM warga.\n3. Membangun infrastruktur desa yang merata di seluruh dusun.\n4. Mendorong pengembangan desa wisata berbasis alam dan budaya.\n5. Memperkuat nilai-nilai keagamaan, kebudayaan, dan gotong royong masyarakat.",
            'sejarah' => "Desa Ciwiru merupakan salah satu desa tua di wilayah Kecamatan Pasawahan, Kabupaten Kuningan, Jawa Barat. Nama Ciwiru menurut tutur sesepuh berasal dari dua kata sunda, 'Ci' yang berarti air dan 'Wiru' yang merujuk pada sebuah pohon atau sumber air yang dahulu menjadi tempat berkumpul masyarakat. Desa ini sudah berdiri sejak masa kolonial dan terus berkembang dari sebuah perkampungan agraris menjadi desa modern yang aktif dalam pembangunan infrastruktur, pertanian, peternakan, dan pariwisata berbasis kaki Gunung Ciremai.\n\nSeiring waktu, Desa Ciwiru tumbuh menjadi pemerintahan desa yang dinamis dengan pelayanan administrasi yang semakin tertib. Sejak tahun 2019, kepemimpinan desa dipegang oleh Bapak Diani Rahman, SE yang membawa semangat digitalisasi pelayanan dan pengembangan potensi wisata desa.",
            'jumlah_penduduk' => '2215',
            'jumlah_kk' => '742',
            'jumlah_laki' => '1009',
            'jumlah_perempuan' => '1206',
            'luas_wilayah' => '169',
            'jumlah_dusun' => '4',
            'jumlah_rw' => '6',
            'jumlah_rt' => '18',
            'ketinggian' => '250 - 600 mdpl',
            'kode_pos' => '45559',
            'kecamatan' => 'Pasawahan',
            'kabupaten' => 'Kuningan',
            'provinsi' => 'Jawa Barat',
            'batas_utara' => 'Desa Pasawahan / Wilayah Kab. Cirebon',
            'batas_selatan' => 'Gunung Ciremai',
            'batas_barat' => 'Wilayah Kab. Majalengka',
            'batas_timur' => 'Kecamatan Mandirancan',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
