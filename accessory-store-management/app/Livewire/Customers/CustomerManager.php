<?php

namespace App\Livewire\Customers;

use Livewire\Component;

class CustomerManager extends Component
{
    public function render()
    {
        return view('livewire.customers.customer-manager')->layout('components.layouts.app', [
            'title' => __('app.customers')
        ]);
    }
}
