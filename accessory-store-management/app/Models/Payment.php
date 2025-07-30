<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payable_type',
        'payable_id',
        'amount',
        'type',
        'method',
        'reference_number',
        'description',
        'user_id',
        'payment_date'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    // العلاقات
    public function payable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // النطاقات (Scopes)
    public function scopePayments($query)
    {
        return $query->where('type', 'دفع');
    }

    public function scopeReceipts($query)
    {
        return $query->where('type', 'استلام');
    }

    public function scopeExpenses($query)
    {
        return $query->where('type', 'مصروف');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('payment_date', Carbon::today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('payment_date', Carbon::now()->month)
                    ->whereYear('payment_date', Carbon::now()->year);
    }

    public function scopeCash($query)
    {
        return $query->where('method', 'نقد');
    }

    public function scopeCard($query)
    {
        return $query->where('method', 'شبكة');
    }
}
