<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Customers extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.customers');
    }
}
