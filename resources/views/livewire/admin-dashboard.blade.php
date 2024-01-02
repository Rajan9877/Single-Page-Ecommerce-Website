<div>
    @if (!session('random'))
        @php
            $this->redirect('/adminlogin', navigate: true);
        @endphp
    @else
    <div class="admin-container">
        <div class="admin-container-left">
            <p>
                <a href="/addproduct"  wire:navigate.hover><button class="addproductbtn">Add Product</button></a>
            </p>
            <p>
                <a href="/addcategory" wire:navigate.hover><button class="addcategorybtn">Add Category</button></a>
            </p>
        </div>

        <div class="admin-container-right">
            <p>
                <a href="/makeuseradmin"  wire:navigate.hover><button class="makeuseradmin">Make User Admin</button></a>
            </p>
            <p>
                <a href="/adminorders"  wire:navigate.hover><button class="adminorders">Orders</button></a>
            </p>
        </div>
    </div>
    @endif
</div>