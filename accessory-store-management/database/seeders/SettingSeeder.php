<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'store_name', 'value' => 'محل إكسسوارات التكنولوجيا', 'type' => 'string', 'description' => 'اسم المحل'],
            ['key' => 'store_phone', 'value' => '0500000000', 'type' => 'string', 'description' => 'هاتف المحل'],
            ['key' => 'store_email', 'value' => 'info@techstore.com', 'type' => 'string', 'description' => 'بريد المحل الإلكتروني'],
            ['key' => 'store_address', 'value' => 'الرياض، المملكة العربية السعودية', 'type' => 'string', 'description' => 'عنوان المحل'],
            ['key' => 'currency', 'value' => 'ريال', 'type' => 'string', 'description' => 'العملة المستخدمة'],
            ['key' => 'tax_rate', 'value' => '15', 'type' => 'number', 'description' => 'معدل الضريبة المضافة بالنسبة المئوية'],
            ['key' => 'low_stock_alert', 'value' => '1', 'type' => 'boolean', 'description' => 'تفعيل تنبيهات نقص المخزون'],
            ['key' => 'default_payment_method', 'value' => 'نقد', 'type' => 'string', 'description' => 'طريقة الدفع الافتراضية'],
            ['key' => 'invoice_prefix', 'value' => 'INV', 'type' => 'string', 'description' => 'بادئة رقم الفاتورة'],
            ['key' => 'purchase_prefix', 'value' => 'PUR', 'type' => 'string', 'description' => 'بادئة رقم فاتورة الشراء'],
            ['key' => 'theme', 'value' => 'light', 'type' => 'string', 'description' => 'المظهر (فاتح/داكن)'],
            ['key' => 'language', 'value' => 'ar', 'type' => 'string', 'description' => 'لغة النظام'],
            ['key' => 'items_per_page', 'value' => '15', 'type' => 'number', 'description' => 'عدد العناصر في الصفحة الواحدة'],
            ['key' => 'backup_enabled', 'value' => '1', 'type' => 'boolean', 'description' => 'تفعيل النسخ الاحتياطي'],
            ['key' => 'receipt_printer', 'value' => '0', 'type' => 'boolean', 'description' => 'تفعيل طباعة الفواتير'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
