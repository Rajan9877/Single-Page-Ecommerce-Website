<div>
    <h3 class="addtocartmsg">{{ $addtocartmsg }}</h3>
    <button id="addtocartbtn" wire:click="add" wire:poll.10s="updateAddToCartMsg">Add To Cart</button>
</div>
