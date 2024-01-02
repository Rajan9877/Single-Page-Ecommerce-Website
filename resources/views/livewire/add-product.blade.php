<div>
    @if (!session('random'))
    @php
        $this->redirect('/login', navigate: true);
    @endphp
@else
    <h3 style="text-align: center; margin-bottom: 5px; color: green;">Add Product</h3>
    <p style="text-align: center; color: red; margin-bottom: 5px;">{{ $message }}</p>
    <div class="addproductform">
        <form wire:submit.prevent="save">
            <p style="text-align: center; color: red;">@error('name') <span class="error">{{ $message }}</span> @enderror</p>
            <input type="text" wire:model="name" placeholder="Enter Product Name">
            <p style="text-align: center; color: red;">@error('description') <span class="error">{{ $message }}</span> @enderror</p>
            <input type="text" wire:model="description" placeholder="Enter Product Description">
            <p style="text-align: center; color: red;">@error('price') <span class="error">{{ $message }}</span> @enderror</p>
            <input type="number" wire:model="price" placeholder="Enter Product Price">
            <p style="text-align: center; color: red;">@error('img') <span class="error">{{ $message }}</span> @enderror</p>
            <input type="file" wire:model="img">
            <p style="text-align: center; color: red;">@error('category') <span class="error">{{ $message }}</span> @enderror</p>
            <select wire:model="category">
                <option value="">Select a category</option>
                @foreach ($categories as $categoryOption)
                    <option value="{{ $categoryOption->id }}">{{ $categoryOption->name }}</option>
                @endforeach
            </select>
            <button>Add Product</button>
        </form>
    </div>
    @endif
</div>
