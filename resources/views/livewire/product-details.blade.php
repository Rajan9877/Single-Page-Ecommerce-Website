<div>
    <div class="product-details-main-container">
        <div class="product-details-container">
            <div class="product-details-left">
                <img src="storage/{{ $product->img }}" alt="" width="327px">
            </div>
            <div class="product-details-right">
                <h1>{{ $product->name }}</h1>   
                <p>{{ $product->description }}</p>
                <h3>₹ {{ (int)$product->price }} </h3>
                <div class="product-details-buttons">
                    <div>
                        <livewire:add-to-cart :productid="$product->id" :categoryid="$product->category_id"/>
                    </div>
                    <div>
                        <livewire:add-to-wishlist :productid="$product->id" :categoryid="$product->category_id"/> 
                    </div>
                    {{-- <button id="addtocartbtn">Add To Cart</button>
                    <button id="addtowishlistbtn">Add To Wishlist</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
