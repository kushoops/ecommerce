<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public $productId;
    public $productName;
    public $productPhoto;
    public $productPrice;

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $this->dispatch('add-to-cart', productId: $this->productId);
    }

    public function render()
    {
        return view('livewire.components.card');
    }
}
