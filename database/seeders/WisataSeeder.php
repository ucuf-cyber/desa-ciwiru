<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Bukit Panyaweuyan Ciwiru',
                'description' => 'Bukit Panyaweuyan menawarkan panorama persawahan terasering yang memukau dengan latar belakang Gunung Ciremai. Spot favorit fotografer dan pemburu sunrise di pagi hari.',
                'thumbnail' => 'https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=1200',
                'lat' => -6.7891, 'lng' => 108.4321, 'ticket_price' => 10000,
                'open_hours' => ['senin'=>'05:00-18:00','selasa'=>'05:00-18:00','rabu'=>'05:00-18:00','kamis'=>'05:00-18:00','jumat'=>'05:00-18:00','sabtu'=>'05:00-19:00','minggu'=>'05:00-19:00'],
                'facilities' => ['Parkir','Mushola','Toilet','Warung','Spot Foto','Camping Ground'],
                'route' => 'Dari pusat Kuningan, ambil arah Pasawahan, lalu ikuti petunjuk menuju Desa Ciwiru. Jarak sekitar 15 km, waktu tempuh 30 menit.',
            ],
            [
                'name' => 'Curug Cilengkrang Ciwiru',
                'description' => 'Air terjun mini di tengah hutan kaki Gunung Ciremai yang menyajikan kesegaran air pegunungan dan suasana alami yang menenangkan.',
                'thumbnail' => 'https://images.unsplash.com/photo-1467890947394-8171244e5410?w=1200',
                'lat' => -6.7950, 'lng' => 108.4380, 'ticket_price' => 5000,
                'open_hours' => ['senin'=>'07:00-17:00','selasa'=>'07:00-17:00','rabu'=>'07:00-17:00','kamis'=>'07:00-17:00','jumat'=>'07:00-17:00','sabtu'=>'07:00-17:00','minggu'=>'07:00-17:00'],
                'facilities' => ['Parkir','Toilet','Warung Sederhana','Pemandu Lokal'],
                'route' => 'Akses dari Kantor Desa Ciwiru menuju arah hutan sekitar 2 km. Disarankan ditemani warga setempat sebagai pemandu.',
            ],
            [
                'name' => 'Agrowisata Kopi Ciwiru',
                'description' => 'Belajar mengenal proses tanam, panen, hingga penyangraian kopi langsung dari petani Desa Ciwiru. Cocok untuk wisata edukasi dan keluarga.',
                'thumbnail' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1200',
                'lat' => -6.7920, 'lng' => 108.4350, 'ticket_price' => 15000,
                'open_hours' => ['senin'=>'08:00-16:00','selasa'=>'08:00-16:00','rabu'=>'08:00-16:00','kamis'=>'08:00-16:00','jumat'=>'08:00-16:00','sabtu'=>'08:00-17:00','minggu'=>'08:00-17:00'],
                'facilities' => ['Tur Edukasi','Kedai Kopi','Spot Foto','Toko Oleh-oleh'],
                'route' => 'Lokasi berada di Dusun Cimanggu, sekitar 1 km dari kantor desa.',
            ],
            [
                'name' => 'Camping Ground Bukit Ciwiru',
                'description' => 'Lokasi camping favorit dengan pemandangan lembah hijau, udara sejuk, dan view sunrise Gunung Ciremai yang spektakuler.',
                'thumbnail' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=1200',
                'lat' => -6.7895, 'lng' => 108.4395, 'ticket_price' => 25000,
                'open_hours' => ['senin'=>'24 jam','selasa'=>'24 jam','rabu'=>'24 jam','kamis'=>'24 jam','jumat'=>'24 jam','sabtu'=>'24 jam','minggu'=>'24 jam'],
                'facilities' => ['Tenda Sewa','Api Unggun','Kamar Mandi','Penerangan','Keamanan'],
                'route' => 'Dari kantor desa naik ke arah barat menuju bukit, sekitar 3 km dengan kendaraan trail/jeep.',
            ],
        ];

        foreach ($items as $w) {
            Wisata::create(array_merge($w, ['slug' => Str::slug($w['name']), 'status' => 'published']));
        }
    }
}
