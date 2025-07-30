<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Categories\CategoryManager;
use App\Livewire\Products\ProductManager;
use App\Livewire\Suppliers\SupplierManager;
use App\Livewire\Customers\CustomerManager;
use App\Livewire\Sales\SaleManager;
use App\Livewire\Purchases\PurchaseManager;
use App\Livewire\POS\PointOfSale;
use App\Livewire\Reports\ReportDashboard;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    // لوحة التحكم
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    
    // نقطة البيع
    Route::get('/pos', PointOfSale::class)->name('pos');
    
    // إدارة التصنيفات
    Route::get('/categories', CategoryManager::class)->name('categories.index');
    
    // إدارة المنتجات
    Route::get('/products', ProductManager::class)->name('products.index');
    
    // إدارة الموردين
    Route::get('/suppliers', SupplierManager::class)->name('suppliers.index');
    
    // إدارة العملاء
    Route::get('/customers', CustomerManager::class)->name('customers.index');
    
    // إدارة المبيعات
    Route::get('/sales', SaleManager::class)->name('sales.index');
    
    // إدارة المشتريات
    Route::get('/purchases', PurchaseManager::class)->name('purchases.index');
    
    // التقارير
    Route::get('/reports', ReportDashboard::class)->name('reports.index');
});

require __DIR__.'/auth.php';
