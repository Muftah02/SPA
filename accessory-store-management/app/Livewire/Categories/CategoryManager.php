<?php

namespace App\Livewire\Categories;

use Livewire\Component;

class CategoryManager extends Component
{
    public function render()
    {
        return view('livewire.categories.category-manager')->layout('components.layouts.app', [
            'title' => __('app.categories')
        ]);
    }
}
