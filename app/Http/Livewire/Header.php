<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class Header extends Component
{
	public $cartTotal = 0;
    protected $listeners = [
        'productAdded'       => 'updateCartTotal',
        'clearCart'          => 'updateCartTotal',
		'qtyRemoved'         => 'updateCartTotal',
    ];

	public function mount(): void
    {
        $this->cartTotal = count((array) session('cart'));
    }

    public function render(): View
    {
        return view('livewire.header');
    }

    public function updateCartTotal(): void
    {
        $this->cartTotal = count((array) session('cart'));
    }
}
