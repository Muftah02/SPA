<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'إكسسوارات الهواتف',
                'description' => 'جرابات، شواحن، سماعات وإكسسوارات الهواتف المحمولة',
                'is_active' => true,
            ],
            [
                'name' => 'إكسسوارات الساعات',
                'description' => 'أساور، شواحن، وإكسسوارات الساعات الذكية',
                'is_active' => true,
            ],
            [
                'name' => 'إكسسوارات الكمبيوتر',
                'description' => 'فأرة، لوحة مفاتيح، سماعات، كاميرات ويب',
                'is_active' => true,
            ],
            [
                'name' => 'الشواحن والكابلات',
                'description' => 'شواحن لجميع الأجهزة، كابلات USB وشواحن لاسلكية',
                'is_active' => true,
            ],
            [
                'name' => 'السماعات والصوتيات',
                'description' => 'سماعات أذن، سماعات رأس، مكبرات صوت محمولة',
                'is_active' => true,
            ],
            [
                'name' => 'حمايات الشاشة',
                'description' => 'واقيات شاشة للهواتف والتابلت وأجهزة الكمبيوتر',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
