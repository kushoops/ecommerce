<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.customer')]
class Products extends Component
{
    public $products=[];

    #[On('add-to-cart')]
    public function addToCart($productId)
    {
        $order = Order::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'open']
        ])->get();

        if (empty($order[0])) {
            Order::create(['user_id' => Auth::user()->id]);
        }
        $order = Order::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'open']
        ])->get();

        $orderItem = OrderItem::where([
            ['order_id', '=', $order[0]['id']],
            ['product_id', '=', $productId]
        ])->get();

        if (empty($orderItem[0])) {
            OrderItem::create([
                'order_id' => $order[0]['id'],
                'product_id' => $productId,
            ]);
        }

        $orderItem = OrderItem::where([
            ['order_id', '=', $order[0]['id']],
            ['product_id', '=', $productId]
        ])->get();

        OrderItem::where([
            ['order_id', '=', $order[0]['id']],
            ['product_id', '=', $productId]
        ])->update(['quantity' => $orderItem[0]['quantity'] + 1]);

        Order::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'open']
        ])->update(['total' => $order[0]['total'] + Product::where('id',$productId)->get()[0]['price']]);

        return redirect()->route('orders');
    }

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.pages.customer.products');
    }
}
