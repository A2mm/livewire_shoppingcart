<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class Cart extends Component
{
	public $carts;

	protected $listeners = [
		'qtyIncrement' => 'QtyUpdate',
		'qtyDecrement' => 'QtyUpdate',
		'qtyRemoved'   => 'QtyUpdate',
	];

	public function increment($id)
	{
		$cart = session()->get('cart');
		$cart[$id]['quantity']++;
		session()->put('cart', $cart);
		$this->emit('qtyIncrement');
	}

	public function decrement($id)
	{
		$cart = session()->get('cart');
		if ($cart[$id]['quantity'] == 1) {
			return;
		}
		$cart[$id]['quantity']--;
		session()->put('cart', $cart);
		$this->emit('qtyDecrement');
	}

	public function QtyUpdate()
	{
		$this->carts = session()->get('cart');
	}

	public function mount()
	{
		$this->carts = session()->get('cart');
	}

    public function render(): View
    {
         return view('livewire.cart', [
            'carts' => $this->carts,
        ]);
    }

    public function removeFromCart($id)
    {
            $cart = session()->get('cart');
            if(isset($cart[$id])) 
            {
                unset($cart[$id]);
                session()->put('cart', $cart);
                $this->emit('qtyRemoved');
            }
    }
}
