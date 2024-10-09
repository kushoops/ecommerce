<?php

namespace App\Livewire\Pages\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.customer')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.customer.dashboard');
    }
}
