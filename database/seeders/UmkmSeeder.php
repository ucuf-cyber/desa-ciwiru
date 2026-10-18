<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        $umkm = [
            [
                'name' => 'Kopi Ciwiru Mountain',
                'owner' => 'Pak Asep',
                'category' => 'Makanan & Minuman',
                'description' => 'Kopi arabika lokal khas kaki Gunung Ciremai, diolah secara tradisional dengan cita rasa khas.',
                'thumbnail' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=800',
                'address' => 'Dusun Cimanggu, Desa Ciwiru',
                'whatsapp' => '6282200001111',
                'products' => [
                    ['name' => 'Kopi Arabika 200gr', 'price' => 65000, 'photo' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=600'],
                    ['name' => 'Kopi Robusta 250gr', 'price' => 55000, 'photo' => 'https://images.unsplash.com/photo-1442550528053-c431ecb55509?w=600'],
                ],
            ],
            [
                'name' => 'Madu Hutan Ciremai',
                'owner' => 'Pak Dadang',
                'category' => 'Makanan & Minuman',
                'description' => 'Madu murni hasil panen dari peternakan lebah lokal di hutan kaki Gunung Ciremai.',
                'thumbnail' => 'https://images.unsplash.com/photo-1587049352846-4a222e784d38?w=800',
                'address' => 'Dusun Sukasari, Desa Ciwiru',
                'whatsapp' => '6282200002222',
                'products' => [
                    ['name' => 'Madu Hutan 250ml', 'price' => 75000, 'photo' => 'https://images.unsplash.com/photo-1587049352846-4a222e784d38?w=600'],
                    ['name' => 'Madu Hutan 500ml', 'price' => 140000, 'photo' => 'https://images.unsplash.com/photo-1601000938259-9e92002320b2?w=600'],
                ],
            ],
            [
                'name' => 'Anyaman Bambu Ciwiru',
                'owner' => 'Bu Rina',
                'category' => 'Kerajinan',
                'description' => 'Aneka kerajinan anyaman bambu untuk perabotan rumah tangga dan dekorasi.',
                'thumbnail' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800',
                'address' => 'Dusun Pasir Bungur, Desa Ciwiru',
                'whatsapp' => '6282200003333',
                'products' => [
                    ['name' => 'Bakul Anyaman', 'price' => 35000, 'photo' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600'],
                    ['name' => 'Tudung Saji Bambu', 'price' => 75000, 'photo' => 'https://images.unsplash.com/photo-1565378435245-bbd60b73c08e?w=600'],
                ],
            ],
            [
                'name' => 'Olahan Singkong Bu Ijah',
                'owner' => 'Bu Ijah',
                'category' => 'Makanan Ringan',
                'description' => 'Aneka camilan olahan singkong khas Sunda: opak, comro, gemblong, dan kerupuk.',
                'thumbnail' => 'https://images.unsplash.com/photo-1604908554007-92eaeae87b88?w=800',
                'address' => 'Dusun Ciwiru Tengah, Desa Ciwiru',
                'whatsapp' => '6282200004444',
                'products' => [
                    ['name' => 'Kerupuk Singkong 200gr', 'price' => 15000, 'photo' => 'https://images.unsplash.com/photo-1604908554007-92eaeae87b88?w=600'],
                    ['name' => 'Opak Singkong', 'price' => 20000, 'photo' => 'https://images.unsplash.com/photo-1606312619070-d48b4c652a52?w=600'],
                ],
            ],
            [
                'name' => 'Pisang Crispy Ciwiru',
                'owner' => 'Pak Yayan',
                'category' => 'Makanan Ringan',
                'description' => 'Camilan pisang crispy renyah dengan berbagai varian rasa.',
                'thumbnail' => 'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=800',
                'address' => 'Dusun Sukasari, Desa Ciwiru',
                'whatsapp' => '6282200005555',
                'products' => [
                    ['name' => 'Pisang Crispy Original', 'price' => 18000, 'photo' => 'https://images.unsplash.com/photo-1528825871115-3581a5387919?w=600'],
                    ['name' => 'Pisang Crispy Coklat', 'price' => 22000, 'photo' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=600'],
                ],
            ],
            [
                'name' => 'Pupuk Organik Tani Maju',
                'owner' => 'Kelompok Tani Maju',
                'category' => 'Pertanian',
                'description' => 'Pupuk organik dari kotoran sapi olahan kelompok tani Desa Ciwiru.',
                'thumbnail' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800',
                'address' => 'Dusun Cimanggu, Desa Ciwiru',
                'whatsapp' => '6282200006666',
                'products' => [
                    ['name' => 'Pupuk Organik Karung 25kg', 'price' => 50000, 'photo' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600'],
                ],
            ],
        ];

        foreach ($umkm as $u) {
            $products = $u['products'];
            unset($u['products']);
            $row = Umkm::create(array_merge($u, [
                'slug' => Str::slug($u['name']),
                'status' => 'published',
                'lat' => -6.7950 + (mt_rand(-30,30)/10000),
                'lng' => 108.4400 + (mt_rand(-30,30)/10000),
            ]));
            foreach ($products as $p) {
                UmkmProduct::create(array_merge($p, ['umkm_id' => $row->id]));
            }
        }
    }
}
