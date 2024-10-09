<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.customer')]
class Orders extends Component
{
    public $order;
    public $orderItems;

    #[On('increment')]
    public function increment($orderItemId, $productPrice)
    {
        $orderItem = OrderItem::where('id', $orderItemId)->get();
        OrderItem::where('id', $orderItemId)->update(['quantity' => $orderItem[0]['quantity']+1]);
        Order::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'open']
        ])->update(['total' => $this->order[0]['total']+$productPrice]);
        $this->mount();
    }
    
    #[On('decrement')]
    public function decrement($orderItemId, $productPrice)
    {
        $orderItem = OrderItem::where('id', $orderItemId)->get();
        if ($orderItem[0]['quantity'] > 1) {
            OrderItem::where('id', $orderItemId)->update(['quantity' => $orderItem[0]['quantity']-1]);
            Order::where([
                ['user_id', '=', Auth::user()->id],
                ['status', '=', 'open']
            ])->update(['total' => $this->order[0]['total']-$productPrice]);
            $this->mount();
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
        return view('livewire.pages.customer.orders');
    }
}
