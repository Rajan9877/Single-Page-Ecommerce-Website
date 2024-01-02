<div>
    <div class="ecommerce-subscribe-container">
        <p class="ecommerce-subscribe-message" wire:poll.10s="updatesubsmsg">{{ $subsmsg }}</p>
        @error('email') <span class="suberror">{{ $message }}</span> @enderror
        <h1>Subscribe Our Newsletter</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus</p>
        <form wire:submit.prevent="save">
            <input type="email" placeholder="Enter Your Email" wire:model="email">
            <button>Submit</button>
        </form>
    </div>
</div>
