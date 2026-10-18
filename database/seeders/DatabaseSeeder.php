<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SiteSettingSeeder::class,
            RunningTextSeeder::class,
            OfficialSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            GallerySeeder::class,
            WisataSeeder::class,
            UmkmSeeder::class,
            ApbdesSeeder::class,
            AgendaAnnouncementSeeder::class,
            SuratComplaintSeeder::class,
        ]);
    }
}
