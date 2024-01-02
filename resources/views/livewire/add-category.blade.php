<div>
    @if (!session('random'))
    @php
        $this->redirect('/login', navigate: true);
    @endphp
@else
    <h3 style="text-align: center; margin-bottom: 5px; color: green;">Add Category</h3>
    <p style="text-align: center; color: red; margin-bottom: 5px;">{{ $message }}</p>
    <p style="text-align: center; color: red; margin-bottom: 5px;">@error('category') <span class="error">{{ $message }}</span> @enderror</p>
    <div class="addcategoryform">
        <form wire:submit.prevent="save">
            <input type="text" wire:model="category" placeholder="Enter Category">
            <button>Add Category</button>
        </form>
    </div>
    @endif
</div>
