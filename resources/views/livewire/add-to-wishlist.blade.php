<div>
    <h3 class="addtocartmsg">{{ $addtocartmsg }}</h3>
    <button  onclick="addToCart()" wire:click="add" id="addtowishlistbtn" wire:poll.10s="updateAddToCartMsg">Add To Wishlist</button>
</div>
