<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
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
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
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
        $totalPurchases = $this->purchases()->sum('remaining');
        $this->update(['balance' => $totalPurchases]);
    }
}
