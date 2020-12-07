<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Product;

class Products extends Component
{
	use WithPagination;

    public    $search;
    protected $updatesQueryString = ['search'];

    public function mount(): void
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render(): View
    {
        return view('livewire.products', [
            'products' => $this->search === null ?
                Product::paginate(5) :
                Product::where('name', 'like', '%' . $this->search . '%')->paginate(5)
        ]);
    }


    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) 
        {
            $cart = [
                    $id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];
            session()->put('cart', $cart);
            $this->emit('productAdded');
           // return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else
        {
		        // if cart not empty then check if this product exist then increment quantity
		        if(isset($cart[$id])) 
		        {
		            $cart[$id]['quantity']++;
		            session()->put('cart', $cart);
                     $this->emit('productAdded');
		            // return redirect()->back()->with('success', 'Product added to cart successfully!');
		        }
		        else
		        {
			        // if item not exist in cart then add to cart with quantity = 1
			        $cart[$id] = [
                        "id" => $product->id,
			            "name" => $product->name,
			            "quantity" => 1,
			            "price" => $product->price,
			            "photo" => $product->photo
			        ];
			        session()->put('cart', $cart);
                     $this->emit('productAdded');
			      //  return redirect()->back()->with('success', 'Product added to cart successfully!');
		        }
		}
    }
}
