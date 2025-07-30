<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        $products = [
            // إكسسوارات الهواتف
            [
                'name' => 'جراب آيفون 15 سيليكون شفاف',
                'description' => 'جراب حماية شفاف من السيليكون لآيفون 15',
                'sku' => 'PRD-000001',
                'barcode' => '1234567890123',
                'category_id' => 1,
                'cost_price' => 25.00,
                'selling_price' => 45.00,
                'quantity' => 50,
                'min_quantity' => 10,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            [
                'name' => 'شاحن آيفون أصلي 20W',
                'description' => 'شاحن آيفون أصلي بقوة 20 واط مع كابل USB-C',
                'sku' => 'PRD-000002',
                'barcode' => '1234567890124',
                'category_id' => 4,
                'cost_price' => 80.00,
                'selling_price' => 120.00,
                'quantity' => 30,
                'min_quantity' => 5,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            [
                'name' => 'سماعات آيربودز برو',
                'description' => 'سماعات آيربودز برو مع خاصية إلغاء الضوضاء',
                'sku' => 'PRD-000003',
                'barcode' => '1234567890125',
                'category_id' => 5,
                'cost_price' => 800.00,
                'selling_price' => 950.00,
                'quantity' => 15,
                'min_quantity' => 3,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            // إكسسوارات الساعات
            [
                'name' => 'حزام آبل واتش رياضي',
                'description' => 'حزام رياضي لآبل واتش جميع الأحجام',
                'sku' => 'PRD-000004',
                'barcode' => '1234567890126',
                'category_id' => 2,
                'cost_price' => 35.00,
                'selling_price' => 65.00,
                'quantity' => 40,
                'min_quantity' => 8,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            [
                'name' => 'شاحن آبل واتش مغناطيسي',
                'description' => 'شاحن مغناطيسي لآبل واتش مع كابل USB',
                'sku' => 'PRD-000005',
                'barcode' => '1234567890127',
                'category_id' => 4,
                'cost_price' => 45.00,
                'selling_price' => 75.00,
                'quantity' => 25,
                'min_quantity' => 5,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            // إكسسوارات الكمبيوتر
            [
                'name' => 'فأرة لاسلكية Logitech',
                'description' => 'فأرة لاسلكية من لوجيتك مع دقة عالية',
                'sku' => 'PRD-000006',
                'barcode' => '1234567890128',
                'category_id' => 3,
                'cost_price' => 60.00,
                'selling_price' => 95.00,
                'quantity' => 35,
                'min_quantity' => 7,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            [
                'name' => 'لوحة مفاتيح ميكانيكية',
                'description' => 'لوحة مفاتيح ميكانيكية مع إضاءة RGB',
                'sku' => 'PRD-000007',
                'barcode' => '1234567890129',
                'category_id' => 3,
                'cost_price' => 150.00,
                'selling_price' => 220.00,
                'quantity' => 20,
                'min_quantity' => 4,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            // كابلات وشواحن
            [
                'name' => 'كابل USB-C إلى Lightning',
                'description' => 'كابل أصلي من آبل USB-C إلى Lightning',
                'sku' => 'PRD-000008',
                'barcode' => '1234567890130',
                'category_id' => 4,
                'cost_price' => 45.00,
                'selling_price' => 75.00,
                'quantity' => 60,
                'min_quantity' => 12,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            [
                'name' => 'شاحن لاسلكي سريع',
                'description' => 'شاحن لاسلكي بقوة 15 واط لجميع الهواتف',
                'sku' => 'PRD-000009',
                'barcode' => '1234567890131',
                'category_id' => 4,
                'cost_price' => 70.00,
                'selling_price' => 110.00,
                'quantity' => 25,
                'min_quantity' => 5,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
            // حمايات الشاشة
            [
                'name' => 'واقي شاشة آيفون 15 زجاجي',
                'description' => 'واقي شاشة زجاجي مقوى لآيفون 15',
                'sku' => 'PRD-000010',
                'barcode' => '1234567890132',
                'category_id' => 6,
                'cost_price' => 15.00,
                'selling_price' => 35.00,
                'quantity' => 100,
                'min_quantity' => 20,
                'unit' => 'قطعة',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
