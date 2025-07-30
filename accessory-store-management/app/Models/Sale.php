<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'user_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'paid',
        'remaining',
        'payment_method',
        'status',
        'notes',
        'sale_date'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'paid' => 'decimal:2',
        'remaining' => 'decimal:2',
        'sale_date' => 'datetime',
    ];

    // العلاقات
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    // النطاقات (Scopes)
    public function scopeCompleted($query)
    {
        return $query->where('status', 'مكتملة');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'معلقة');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('sale_date', Carbon::today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('sale_date', Carbon::now()->month)
                    ->whereYear('sale_date', Carbon::now()->year);
    }

    // الدوال المساعدة
    public function calculateTotals()
    {
        $this->subtotal = $this->items->sum('total_price');
        $this->total = $this->subtotal - $this->discount + $this->tax;
        $this->remaining = $this->total - $this->paid;
        $this->save();
    }

    public function addPayment($amount, $method = 'نقد')
    {
        $this->paid += $amount;
        $this->remaining = $this->total - $this->paid;
        
        if ($this->remaining <= 0) {
            $this->status = 'مكتملة';
        }
        
        $this->save();
        
        // إضافة سجل الدفع
        $this->payments()->create([
            'amount' => $amount,
            'type' => 'استلام',
            'method' => $method,
            'user_id' => auth()->id(),
            'payment_date' => now(),
        ]);
    }

    public static function generateInvoiceNumber()
    {
        $lastSale = static::latest('id')->first();
        $nextId = $lastSale ? $lastSale->id + 1 : 1;
        return 'INV-' . date('Y') . '-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    }
}
