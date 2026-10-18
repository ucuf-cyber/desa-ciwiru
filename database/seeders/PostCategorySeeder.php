<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Berita Desa','Pengumuman','Kegiatan','Pembangunan','Pertanian','Sosial Kemasyarakatan','Kesehatan','Pendidikan'];
        foreach ($categories as $c) {
            PostCategory::create(['name' => $c, 'slug' => Str::slug($c), 'description' => "Kategori artikel $c di Desa Ciwiru"]);
        }
    }
}
