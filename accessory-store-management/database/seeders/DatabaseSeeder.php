<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\SettingService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
        
        // تهيئة الإعدادات الافتراضية
        SettingService::initializeDefaults();
    }
}
