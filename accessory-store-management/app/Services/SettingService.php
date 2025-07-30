<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public static function get($key, $default = null)
    {
        return Setting::getValue($key, $default);
    }

    public static function set($key, $value, $type = 'string')
    {
        return Setting::setValue($key, $value, $type);
    }

    public static function getStoreName()
    {
        return self::get('store_name', 'محل الإكسسوارات');
    }

    public static function getCurrency()
    {
        return self::get('currency', 'ريال');
    }

    public static function getTaxRate()
    {
        return self::get('tax_rate', 0);
    }

    public static function getContactInfo()
    {
        return [
            'phone' => self::get('store_phone'),
            'email' => self::get('store_email'),
            'address' => self::get('store_address'),
        ];
    }

    public static function getDefaultSettings()
    {
        return [
            'store_name' => 'محل الإكسسوارات',
            'store_phone' => '',
            'store_email' => '',
            'store_address' => '',
            'currency' => 'ريال',
            'tax_rate' => 0,
            'low_stock_alert' => true,
            'default_payment_method' => 'نقد',
            'invoice_prefix' => 'INV',
            'purchase_prefix' => 'PUR',
            'theme' => 'light',
            'language' => 'ar',
            'items_per_page' => 15,
            'backup_enabled' => true,
            'receipt_printer' => false,
        ];
    }

    public static function initializeDefaults()
    {
        $defaults = self::getDefaultSettings();
        
        foreach ($defaults as $key => $value) {
            if (!Setting::where('key', $key)->exists()) {
                $type = is_bool($value) ? 'boolean' : (is_numeric($value) ? 'number' : 'string');
                Setting::setValue($key, $value, $type);
            }
        }
    }
}