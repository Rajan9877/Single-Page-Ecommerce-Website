@if (session('rand'))
    <script>
        window.location.href = "http://localhost:8000/";
    </script>
@endif
<div>
    <div class="login-container">
        <div class="login-box">
            <div class="login-box-msg">
                <h3>Login</h3>
                <p>Get access to your Cart, Wishlist,<br> Orders and Recommendations</p>
                @error('failed') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="login-box-form">
                <form wire:submit.prevent="login">
                    <label for="email">Email</label>
                    <input type="email" wire:model="email" placeholder="Enter Email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                    <label for="password">Password</label>
                    <input type="password" wire:model="password" placeholder="Enter Password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror                
                    <button type="submit" class="btn-submit-login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
