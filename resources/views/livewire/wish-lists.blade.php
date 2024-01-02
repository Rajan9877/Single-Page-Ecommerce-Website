<div wire:poll.keep-alive>
    <h3 class="removewishlistmsg" wire:poll.10s="updateremovewishlist">{{ $deletewishlistmsg }}</h3>
    <div class="addtowishlistcontainer">
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Add To Cart</th>
                <th>Remove</th>
            </tr>
            @foreach ($wishlists as $wishlist)
            <tr>
                <td><img src="storage/{{ $wishlist->product->img }}" alt="" width="50px"></td> 
                <td>{{ $wishlist->product->name }}</td>
                <td>{{ (int)$wishlist->product->price }}</td>
                <td><input id="quantityinput" type="number" wire:model.live="updateQuantity" value="{{ $wishlist->quantity }}" min="1"></td>
                <td><livewire:add-to-cart-from-wishlist :productid="$wishlist->product->id" :categoryid="$wishlist->product->category_id"/></td>
                <td><button class="tracewishlist" wire:click="removewishlist({{ $wishlist->id }})"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
