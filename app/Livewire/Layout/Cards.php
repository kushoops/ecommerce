<?php

namespace App\Livewire\Layout;

use App\Models\Product;
use Livewire\Component;

class Cards extends Component
{
    public $products=[];

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.layout.cards');
    }
}