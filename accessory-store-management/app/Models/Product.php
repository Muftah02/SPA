<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'category_id',
        'cost_price',
        'selling_price',
        'quantity',
        'min_quantity',
        'unit',
        'images',
        'notes',
        'is_active'
    ];

    protected $casts = [
        'cost_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'quantity' => 'integer',
        'min_quantity' => 'integer',
        'images' => 'array',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    // النطاقات (Scopes)
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('quantity', '<=', 'min_quantity');
    }

    public function scopeInStock($query)
    {
        return $query->where('quantity', '>', 0);
    }

    // الدوال المساعدة
    public function isLowStock()
    {
        return $this->quantity <= $this->min_quantity;
    }

    public function getProfitMarginAttribute()
    {
        if ($this->cost_price > 0) {
            return (($this->selling_price - $this->cost_price) / $this->cost_price) * 100;
        }
        return 0;
    }

    public function getProfitAttribute()
    {
        return $this->selling_price - $this->cost_price;
    }

    // تحديث الكمية
    public function updateQuantity($quantity, $operation = 'add')
    {
        if ($operation === 'add') {
            $this->increment('quantity', $quantity);
        } elseif ($operation === 'subtract') {
            $this->decrement('quantity', $quantity);
        }
    }

    // توليد SKU تلقائي
    public static function generateSKU()
    {
        $lastProduct = static::latest('id')->first();
        $nextId = $lastProduct ? $lastProduct->id + 1 : 1;
        return 'PRD-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    }
}
