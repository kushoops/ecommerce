<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Transaction extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::where('status', 'paid')->orderBy('updated_at', 'desc')->get();
    }
    
    public function render()
    {
        return view('livewire.pages.admin.transaction');
    }
}
