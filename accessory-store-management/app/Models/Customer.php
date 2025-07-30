<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'notes',
        'balance',
        'is_active'
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    // النطاقات (Scopes)
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // الدوال المساعدة
    public function updateBalance()
    {
        $totalSales = $this->sales()->sum('remaining');
        $this->update(['balance' => $totalSales]);
    }

    public function getTotalPurchasesAttribute()
    {
        return $this->sales()->sum('total');
    }
}
