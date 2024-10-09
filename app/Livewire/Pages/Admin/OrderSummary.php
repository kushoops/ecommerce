<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\PDF;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class OrderSummary extends Component
{
    public $order;
    public $orderItems;

    public function download()
    {
        $data = [
            'order' => $this->order,
            'orderItems' => $this->orderItems,
        ];

        $pdf = PDF::loadView('livewire/pages/customer/order-summary-pdf', $data);
        return response()->streamDownload(function() use($pdf) {
            echo $pdf->stream();
        },'invoice.pdf');
    }

    public function mount($id)
    {
        $this->order = Order::where('id',$id)->get();
        $this->orderItems = OrderItem::where('order_id', $this->order[0]['id'],)
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->select('order_items.*', 'products.name', 'products.photo', 'products.price')->get();
    }
    
    public function render()
    {
        return view('livewire.pages.admin.order-summary');
    }
}
