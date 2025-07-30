<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'supplier_id',
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
        'purchase_date'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'paid' => 'decimal:2',
        'remaining' => 'decimal:2',
        'purchase_date' => 'datetime',
    ];

    // العلاقات
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
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
        return $query->whereDate('purchase_date', Carbon::today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('purchase_date', Carbon::now()->month)
                    ->whereYear('purchase_date', Carbon::now()->year);
    }

    // الدوال المساعدة
    public function calculateTotals()
    {
        $this->subtotal = $this->items->sum('total_cost');
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
            'type' => 'دفع',
            'method' => $method,
            'user_id' => auth()->id(),
            'payment_date' => now(),
        ]);
    }

    public static function generateInvoiceNumber()
    {
        $lastPurchase = static::latest('id')->first();
        $nextId = $lastPurchase ? $lastPurchase->id + 1 : 1;
        return 'PUR-' . date('Y') . '-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    }
}
