       <?php // $total += $details['price'] * $details['quantity'] ?>
        <?php /*
        $total = 0 
        @if(session('cart'))
        */ ?>
       
    <div class="w-2/3 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            @if(count((array) session('cart')))
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Piece Price</th>  
                             <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Quantity</th>  
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Subtotal </th>  
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $product)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product['name'] }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product['price'] }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                <button wire:click="decrement({{ $product['id'] }})" class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> - </button>
                               {{ $product['quantity'] }}
                               <button wire:click="increment({{ $product['id'] }})" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> + </button>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                {{ $product['price'] * $product['quantity'] }}</td>

                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a wire:click="removeFromCart({{ $product['id'] }})" class="text-green-600 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark cursor-pointer">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right w-full p-6">

                </div>
            @else
                <div class="text-center w-full border-collapse p-6">
                    <span class="text-lg"> Your cart is empty!</span>
                </div>
            @endif
        </div>
    </div>
</div>

