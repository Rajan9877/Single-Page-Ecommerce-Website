@if (session('rand'))
    <script>
        window.location.href = "http://localhost:8000/";
    </script>
@endif
<div>
    <div class="signup-container">
        <div class="signup-box">
            <div class="signup-box-msg">
                <h3>Looks like you're new here!</h3>
                <p>Sign up to get started.</p>
                <p wire:poll.10s="updateSignup" class="signup-submit-msg">{{ $confirm }}</p>
            </div>
            <div class="signup-box-form">
                <form wire:submit.prevent="save">
                    <label for="name">Name</label>
                    <input type="text" wire:model="name" placeholder="Enter Name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                
                    <label for="email">Email</label>
                    <input type="email" wire:model="email" placeholder="Enter Email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                
                    <label for="phone">Mobile Number</label>
                    <input type="text" wire:model="phone" placeholder="Enter Mobile Number">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                
                    <label for="password">Password</label>
                    <input type="password" wire:model="password" placeholder="Enter Password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" wire:model="cpassword" placeholder="Enter Confirm Password">
                    @error('cpassword') <span class="error">{{ $message }}</span> @enderror
                
                    <button type="submit" class="btn-submit-signup">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>
