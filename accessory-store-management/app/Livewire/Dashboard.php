<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Supplier;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $todaySales;
    public $monthSales;
    public $totalProducts;
    public $lowStockProducts;
    public $totalCustomers;
    public $totalSuppliers;
    public $recentSales;
    public $topProducts;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // مبيعات اليوم
        $this->todaySales = Sale::today()->sum('total');
        
        // مبيعات الشهر
        $this->monthSales = Sale::thisMonth()->sum('total');
        
        // إجمالي المنتجات
        $this->totalProducts = Product::count();
        
        // المنتجات قليلة المخزون
        $this->lowStockProducts = Product::lowStock()->count();
        
        // إجمالي العملاء
        $this->totalCustomers = Customer::count();
        
        // إجمالي الموردين
        $this->totalSuppliers = Supplier::count();
        
        // آخر 5 عمليات بيع
        $this->recentSales = Sale::with(['customer', 'user'])
            ->latest()
            ->take(5)
            ->get();
        
        // أكثر المنتجات مبيعاً
        $this->topProducts = Product::withCount(['saleItems' => function($query) {
                $query->whereHas('sale', function($q) {
                    $q->whereMonth('sale_date', Carbon::now()->month);
                });
            }])
            ->orderBy('sale_items_count', 'desc')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app', [
            'title' => __('app.dashboard')
        ]);
    }
}
