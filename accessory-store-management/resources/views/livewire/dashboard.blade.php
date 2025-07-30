<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ __('app.dashboard') }}</h1>
        <p class="mt-2 text-gray-600">مرحباً بك في نظام إدارة محل الإكسسوارات</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Today Sales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mr-5">
                        <p class="text-sm font-medium text-gray-500">{{ __('app.daily_sales') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($todaySales, 2) }}</p>
                        <p class="text-sm text-gray-500">{{ App\Services\SettingService::getCurrency() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Sales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mr-5">
                        <p class="text-sm font-medium text-gray-500">{{ __('app.monthly_sales') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($monthSales, 2) }}</p>
                        <p class="text-sm text-gray-500">{{ App\Services\SettingService::getCurrency() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM6 9a1 1 0 112 0v6a1 1 0 11-2 0V9zm6 0a1 1 0 112 0v6a1 1 0 11-2 0V9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mr-5">
                        <p class="text-sm font-medium text-gray-500">{{ __('app.products') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalProducts) }}</p>
                        <p class="text-sm text-gray-500">منتج</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Alert -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mr-5">
                        <p class="text-sm font-medium text-gray-500">{{ __('app.low_stock') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($lowStockProducts) }}</p>
                        <p class="text-sm text-gray-500">منتج</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid for Recent Sales and Top Products -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Sales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">آخر العمليات</h3>
            </div>
            <div class="px-6 py-4">
                @if($recentSales->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentSales as $sale)
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">فاتورة رقم: {{ $sale->invoice_number }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $sale->customer?->name ?? 'عميل نقدي' }} • 
                                        {{ $sale->sale_date->format('H:i') }}
                                    </p>
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ number_format($sale->total, 2) }} {{ App\Services\SettingService::getCurrency() }}
                                    </p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $sale->status === 'مكتملة' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $sale->status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">لا توجد عمليات بيع حديثة</p>
                @endif
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">أكثر المنتجات مبيعاً هذا الشهر</h3>
            </div>
            <div class="px-6 py-4">
                @if($topProducts->count() > 0)
                    <div class="space-y-4">
                        @foreach($topProducts as $product)
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-500">كود: {{ $product->sku }}</p>
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-medium text-gray-900">{{ $product->sale_items_count }} قطعة</p>
                                    <p class="text-sm text-gray-500">
                                        {{ number_format($product->selling_price, 2) }} {{ App\Services\SettingService::getCurrency() }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">لا توجد مبيعات هذا الشهر</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-4">الإجراءات السريعة</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('pos') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="px-6 py-4 text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-900">عملية بيع جديدة</p>
                </div>
            </a>
            
            <a href="{{ route('products.index') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="px-6 py-4 text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-900">إدارة المنتجات</p>
                </div>
            </a>
            
            <a href="{{ route('customers.index') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="px-6 py-4 text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-900">إدارة العملاء</p>
                </div>
            </a>
            
            <a href="{{ route('reports.index') }}" class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="px-6 py-4 text-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-900">التقارير</p>
                </div>
            </a>
        </div>
    </div>
</div>
