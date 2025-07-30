<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

class SupplierManager extends Component
{
    public function render()
    {
        return view('livewire.suppliers.supplier-manager')->layout('components.layouts.app', [
            'title' => __('app.suppliers')
        ]);
    }
}
