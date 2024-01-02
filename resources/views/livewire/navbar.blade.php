<div>
    <div class="navbar">
        <div class="nav-left">
            <a href="/" wire:navigate.hover><i class="fa-solid fa-dumpster"></i></a>
        </div>
        <div class="nav-middle">
            <ul>
                <li><a href="/" wire:navigate.hover>Home</a></li>
                <li><a href="/about" wire:navigate.hover>About</a></li>
                <li><a href="/shop" wire:navigate.hover>Shop</a></li>
                <li><a href="/contact" wire:navigate.hover>Contact</a></li>
            </ul>
            <div class="search-box">
                <livewire:search />
            </div>
            <div>
                <a href="/myaccount" wire:navigate.hover><button class="myaccountbtn">My Account</button></a>
            </div>
        </div>
        <div class="nav-right">
            @if (!session('rand'))
            <div class="login">
                <a href="/login" wire:navigate.hover><button class="btn-login">Login</button></a>
            </div>
            <div class="signup">
                <a href="/signup" wire:navigate.hover><button class="btn-signup">Sign Up</button></a>
            </div>
            @else
            <div class="welcome">
                <span>Hi, {{ session('name') }}</span>
                <livewire:logout />
            </div>
            @endif
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="wishlist">
                <i class="fa-solid fa-heart"></i>
            </div>
        </div>
    </div>
</div>
