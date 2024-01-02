<div>
    <h1 class="categoryheader">Categories</h1>
    <div class="categories-container">
        <div class="categories-buttons">
            @foreach ($categories as $category)
            <a href="{{ route('products-with-category', ['id' => $category->id]) }}" wire:navigate.hover><button>{{ $category->name }}</button></a>
            @endforeach
        </div>
    </div>
</div>
