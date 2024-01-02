<div>
    @if (!session('rand'))
    @php
        $this->redirect('/login', navigate: true);
    @endphp
    @else
    <h4 style="color: green; text-align: center;">{{ $msg }}</h4>
    <div class="checkout-container">
        <div class="left-checkout-container">
            <h1>Shipping Address</h1>
            @error('firstname') <p class="error">{{ $message }}</p> @enderror
            @error('lastname') <p class="error">{{ $message }}</p> @enderror
            @error('email') <p class="error">{{ $message }}</p> @enderror
            @error('mobile') <p class="error">{{ $message }}</p> @enderror
            @error('address') <p class="error">{{ $message }}</p> @enderror
            @error('country') <p class="error">{{ $message }}</p> @enderror
            @error('city') <p class="error">{{ $message }}</p> @enderror
            @error('state') <p class="error">{{ $message }}</p> @enderror
            @error('pincode') <p class="error">{{ $message }}</p> @enderror
            <div class="checkout-address-form-container">
                <form>
                    <div>
                        <div>
                            <label for="firstname">First Name</label>
                            <input type="text" placeholder="First Name" id="firstname" wire:model.blur="firstname">
                        </div>
                        <div>
                            <label for="lastname">Last Name</label>
                            <input type="text" placeholder="Last Name" id="lastname" wire:model.blur="lastname">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" placeholder="E-mail" id="email" wire:model.blur="email">
                        </div>
                        <div>
                            <label for="mobile">Mobile</label>
                            <input type="number" placeholder="Mobile" id="mobile" wire:model.blur="mobile">
                        </div>
                    </div>
                        <label for="address">Address</label>
                        <input type="text" placeholder="Address" id="address" wire:model.blur="address">
                
                    <div>
                        <div>
                            <label for="country">Country</label>
                            <input type="text" placeholder="Country" id="country" wire:model.blur="country">
                        </div>
                        <div>
                            <label for="city">City</label>
                            <input type="text" placeholder="City" id="city" wire:model.blur="city">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="state">State</label>
                            <input type="text" placeholder="State" id="state" wire:model.blur="state">
                        </div>
                        <div>
                            <label for="pincode">Pin Code</label>
                            <input type="number" placeholder="Pin Code" id="pincode" wire:model.blur="pincode">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="right-checkout-container">
            <h1>Cart Total</h1>
            <div class="checkout-details-container">
                <table wire:poll.keep-alive = "updatecheckout">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ (int)$cart->product->price }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ (int)$cart->product->price * $cart->quantity }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Sub Total</td>
                        <td></td>
                        <td></td>
                        <td>{{ $subtotal }}</td>
                    </tr>
                    <tr>
                        <td>Shipping Cost</td>
                        <td></td>
                        <td></td>
                        <td>50 Rs.</td>
                    </tr>
                    <tr>
                        <td><h3>Grand Total</h3></td>
                        <td></td>
                        <td></td>
                        <td>{{ $subtotal + 50 }}</td>
                    </tr>
                </table>
            </div>
            <h1>Payment Methods</h1>
            <div>
                <p>Cash On Delivery Only</p>
            </div>
            <input type="hidden" wire:model="subtotal" value="{{ $subtotal }}">
            <button class="placeorderbtn" wire:click="placeorder"  wire:confirm="Are you sure you want to place your order?">Place Order</button>
        </div>
        <p id="redirectbtn" wire:click="redirecthome"></p>
    </div>
    @script
    <script>
        $wire.on('orderplaced', () => {
            setTimeout(() => {
                $('#redirectbtn').trigger('click');
        }, 5000);
        });
    </script>
    @endscript
    @endif
</div>
