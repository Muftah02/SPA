<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // العلاقات
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // الأحداث
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($saleItem) {
            $saleItem->total_price = $saleItem->quantity * $saleItem->unit_price;
        });

        static::created(function ($saleItem) {
            // تقليل كمية المنتج
            $saleItem->product->updateQuantity($saleItem->quantity, 'subtract');
        });

        static::deleted(function ($saleItem) {
            // إرجاع كمية المنتج
            $saleItem->product->updateQuantity($saleItem->quantity, 'add');
        });
    }
}
