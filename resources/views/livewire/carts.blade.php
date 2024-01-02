<div wire:poll.keep-alive>
    <h3 class="removecartmsg" wire:poll.10s="updateremovecart">{{ $deletecartmsg }}</h3>
    <div class="addtocartcontainer">
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                {{-- <th>Total</th> --}}
                <th>Remove</th>
            </tr>
            @foreach ($carts as $cart)
            <tr>
                <td><img src="storage/{{ $cart->product->img }}" alt="" width="50px"></td> 
                <td>{{ $cart->product->name }}</td>
                <td>{{ (int)$cart->product->price }}</td>
                {{-- <td><input id="quantityinput" type="number" wire:change="updateQuantity({{ $cart->product->id }}, {{ $cart->quantity }})" value="{{ $cart->quantity }}" min="1"></td> --}}
                <td>
                    <select id="quantityinput" name="quantity" wire:model="quantity" wire:change="updateQuantity({{ $cart->product->id }})">
                        <option value="1" {{ $cart->quantity == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $cart->quantity == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $cart->quantity == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $cart->quantity == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $cart->quantity == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $cart->quantity == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $cart->quantity == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $cart->quantity == 8 ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $cart->quantity == 9 ? 'selected' : '' }}>9</option>
                        <option value="10" {{ $cart->quantity == 10 ? 'selected' : '' }}>10</option>
                    </select>                    
                </td>
                {{-- <td>{{ $cart->product->price * $cart->quantity }}</td> --}}
                <td><button class="tracecart" wire:click="removecart({{ $cart->id }})"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="cart-checkout-btn">
        <a href="/checkout" wire:navigate.hover><button>Check Out</button></a>
    </div>
</div>
