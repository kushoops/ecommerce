<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Cart extends Component
{
    public $productName;
    public $productPhoto;
    public $productPrice;
    public $orderItemQuantity;
    public $orderItemId;

    public function increment()
    {
        $this->dispatch('increment', orderItemId: $this->orderItemId, productPrice: $this->productPrice);
    }
    
    public function decrement()
    {
        $this->dispatch('decrement', orderItemId: $this->orderItemId, productPrice: $this->productPrice);
    }

    public function render()
    {
        return view('livewire.components.cart');
    }
}
