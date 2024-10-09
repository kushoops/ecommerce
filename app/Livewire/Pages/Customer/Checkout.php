<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.customer')]
class Checkout extends Component
{
    public $address;
    public $postalCode;
    public $telephone;
    public $payment;
    public $order;
    public $orderItems;

    public function processToPayment()
    {
        if ($this->payment) {
            Order::where([
                ['user_id', '=', Auth::user()->id],
                ['status', '=', 'open']
            ])->update([
                'payment' => $this->payment,
                'address' => $this->address,
                'postal_code' => (string)$this->postalCode,
                'telephone' => (string)$this->telephone,
                'status' => 'paid',
            ]);
            return redirect()->route('transaction');
        }
    }

    public function mount()
    {   
        $this->order = Order::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'open']
        ])->get();
        if (!empty($this->order[0])) {
            $this->orderItems = OrderItem::where('order_id', $this->order[0]['id'],)
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->select('order_items.*', 'products.name', 'products.photo', 'products.price')->get();
        }
    }

    public function render()
    {
        return view('livewire.pages.customer.checkout');
    }
}
