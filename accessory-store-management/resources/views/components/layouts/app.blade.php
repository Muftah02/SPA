<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' : '' }}{{ __('app.store_name') }}</title>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 font-cairo">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg border-b">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo and Store Name -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-xl font-bold text-gray-900">
                                {{ App\Services\SettingService::getStoreName() }}
                            </h1>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-reverse space-x-8">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'text-blue-600 bg-blue-50' : '' }}">
                            {{ __('app.dashboard') }}
                        </a>
                        <a href="{{ route('pos') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('pos') ? 'text-blue-600 bg-blue-50' : '' }}">
                            نقطة البيع
                        </a>
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('products.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                            {{ __('app.products') }}
                        </a>
                        <a href="{{ route('sales.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('sales.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                            {{ __('app.sales') }}
                        </a>
                        <a href="{{ route('purchases.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('purchases.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                            {{ __('app.purchases') }}
                        </a>
                        <a href="{{ route('reports.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('reports.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                            {{ __('app.reports') }}
                        </a>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center">
                        <div class="relative">
                            <button type="button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="user-menu-button">
                                <span class="sr-only">فتح قائمة المستخدم</span>
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-medium">
                                    {{ substr(auth()->user()->name ?? 'م', 0, 1) }}
                                </div>
                                <span class="mr-2 text-gray-700">{{ auth()->user()->name ?? 'مستخدم' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="md:hidden border-t border-gray-200">
                <div class="px-4 py-3 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'text-blue-600' : '' }}">
                        {{ __('app.dashboard') }}
                    </a>
                    <a href="{{ route('pos') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('pos') ? 'text-blue-600' : '' }}">
                        نقطة البيع
                    </a>
                    <a href="{{ route('products.index') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('products.*') ? 'text-blue-600' : '' }}">
                        {{ __('app.products') }}
                    </a>
                    <a href="{{ route('sales.index') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('sales.*') ? 'text-blue-600' : '' }}">
                        {{ __('app.sales') }}
                    </a>
                    <a href="{{ route('purchases.index') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('purchases.*') ? 'text-blue-600' : '' }}">
                        {{ __('app.purchases') }}
                    </a>
                    <a href="{{ route('reports.index') }}" class="block text-gray-600 hover:text-blue-600 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('reports.*') ? 'text-blue-600' : '' }}">
                        {{ __('app.reports') }}
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                @if (isset($title))
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>