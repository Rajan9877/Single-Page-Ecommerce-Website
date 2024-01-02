<div>
    @if($products->isEmpty())
        <h3 style="text-align: center; color: green;">There is no product named <span style="color: red;">{{ $recievedata }}</span>.</h3>
    @else
    <div class="product-container">
        <h1 class="products-header">Products</h1>
        <div class="product-card-container">
            <div class="product-cards">
                @foreach ($products as $product)
                <div class="product-card">
                    <img src="storage/{{ $product->img }}" alt="Card 1" width="250px">
                    <a href="{{ route('productdetails', ['id' => $product->id]) }}" wire:navigate.hover><h3>{{ $product->name }}</h3></a>
                    <p>Price: {{ (int)$product->price }} ₹</p>
                    <livewire:add-to-cart :productid="$product->id" :categoryid="$product->category_id"/>
                    <livewire:add-to-wishlist :productid="$product->id" :categoryid="$product->category_id"/>       
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="buttons">
        <button class="navigation-btn" id="startBtn" onclick="start()">start</button>
        <button class="navigation-btn" id="prev" onclick="navigate(-1)">&lt;</button>
        <button class="navigation-btn" id="next" onclick="navigate(1)">&gt;</button>
        <button class="navigation-btn" id="endBtn" onclick="end()">end</button>
    </div>
    @endif
</div>
