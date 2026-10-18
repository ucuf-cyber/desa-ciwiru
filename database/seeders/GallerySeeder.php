<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            ['title' => 'Kegiatan Pemerintahan Desa', 'description' => 'Dokumentasi rapat, musrenbang, dan kegiatan pemerintahan.'],
            ['title' => 'Pembangunan Infrastruktur', 'description' => 'Dokumentasi pembangunan jalan, drainase, dan fasilitas desa.'],
            ['title' => 'Wisata Alam Ciwiru', 'description' => 'Keindahan alam kaki Gunung Ciremai di Desa Ciwiru.'],
            ['title' => 'Budaya dan Tradisi', 'description' => 'Kegiatan budaya, hari besar, dan tradisi warga Desa Ciwiru.'],
        ];

        $images = [
            'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800',
            'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800',
            'https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=800',
            'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?w=800',
            'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
            'https://images.unsplash.com/photo-1444930694458-01babe71870e?w=800',
        ];

        foreach ($albums as $i => $a) {
            $album = GalleryAlbum::create([
                'title' => $a['title'],
                'slug' => Str::slug($a['title']),
                'description' => $a['description'],
                'cover' => $images[$i % count($images)],
            ]);
            for ($j = 0; $j < 6; $j++) {
                GalleryItem::create([
                    'album_id' => $album->id,
                    'type' => 'image',
                    'file_path' => $images[($i + $j) % count($images)],
                    'caption' => $a['title'] . ' - foto ' . ($j + 1),
                    'sort_order' => $j,
                ]);
            }
        }
    }
}
