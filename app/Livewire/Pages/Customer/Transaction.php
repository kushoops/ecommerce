<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.customer')]
class Transaction extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::where([['user_id', '=', Auth::user()->id], ['status','=', 'paid']])->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.pages.customer.transaction');
    }
}
