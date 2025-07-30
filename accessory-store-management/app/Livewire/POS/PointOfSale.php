<?php

namespace App\Livewire\POS;

use Livewire\Component;

class PointOfSale extends Component
{
    public function render()
    {
        return view('livewire.p-o-s.point-of-sale')->layout('components.layouts.app', [
            'title' => 'نقطة البيع'
        ]);
    }
}
