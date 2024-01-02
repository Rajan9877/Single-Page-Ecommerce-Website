<div>
    <h1 class="contactus">Talk With Us</h1>
    <div class="error-massages">
        @error('name') <span class="error">{{ $message }}</span> @enderror
        @error('email') <span class="error">{{ $message }}</span> @enderror
        @error('mobile') <span class="error">{{ $message }}</span> @enderror
        @error('subject') <span class="error">{{ $message }}</span> @enderror
        @error('message') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="success-messages" wire:poll.10s="updateResponse">
        {{ $response }}
    </div>
    <div class="contact-container">
        <div class="contact-left">
            <form wire:submit.prevent="contact">
                <div>
                    <input type="text" placeholder="Your Name" wire:model="name">
                    <input type="email" placeholder="Your Email" wire:model="email">
                </div>
                <input class="outer-contact-input" type="number" placeholder="Mobile" wire:model="mobile">
                <input class="outer-contact-input" type="text" placeholder="Subject" wire:model="subject">
                <textarea placeholder="Message" wire:model="message"></textarea>
                <button>Send Message</button>
            </form>
        </div>
        <div class="contact-right">
            <h1>Get In Touch</h1>
            <hr>
            <small>We will respond as soon as possible.</small>
            <div class="contact-address">
                <i class="fa-solid fa-location-dot"></i> <span>H No. 131 Paras Estate Leather Complex Basti Peerdad Jalandhar Punjab</span>
            </div>
            <div class="contact-email">
                <i class="fa-solid fa-envelope"></i> <span>Rajanjoriya000000@gmail.com</span>
            </div>
            <div class="contact-phone">
                <i class="fa-solid fa-phone"></i> <span>+91 8112895711</span>
            </div>
            <div class="contact-social-media">
                <a href=""><button><i class="fa-brands fa-twitter"></i></button></a>
                <a href=""><button><i class="fa-brands fa-facebook"></i></button></a>
                <a href=""><button><i class="fa-brands fa-linkedin"></i></button></a>
                <a href=""><button><i class="fa-brands fa-instagram"></i></button></a>
                <a href=""><button><i class="fa-brands fa-youtube"></i></button></a>
            </div>
        </div>
    </div>
</div>
