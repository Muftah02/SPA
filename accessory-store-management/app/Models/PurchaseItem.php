<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'unit_cost',
        'total_cost'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_cost' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    // العلاقات
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // الأحداث
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($purchaseItem) {
            $purchaseItem->total_cost = $purchaseItem->quantity * $purchaseItem->unit_cost;
        });

        static::created(function ($purchaseItem) {
            // زيادة كمية المنتج
            $purchaseItem->product->updateQuantity($purchaseItem->quantity, 'add');
            
            // تحديث سعر التكلفة للمنتج
            $purchaseItem->product->update([
                'cost_price' => $purchaseItem->unit_cost
            ]);
        });

        static::deleted(function ($purchaseItem) {
            // تقليل كمية المنتج
            $purchaseItem->product->updateQuantity($purchaseItem->quantity, 'subtract');
        });
    }
}
