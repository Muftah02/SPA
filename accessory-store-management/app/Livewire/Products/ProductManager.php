<?php

namespace App\Livewire\Products;

use Livewire\Component;

class ProductManager extends Component
{
    public function render()
    {
        return view('livewire.products.product-manager')->layout('components.layouts.app', [
            'title' => __('app.products')
        ]);
    }
}
