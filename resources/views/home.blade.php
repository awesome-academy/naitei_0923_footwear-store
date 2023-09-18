<x-app-layout>
    <x-hero-banner small-text="Beat Solo Air" 
        mid-text="Summer Sale" 
        large-text-1="FINE" 
        desc="Beats Solo Air" 
        image='storage/images/brands_logo/black-shoes.png' />
    <div class="products-heading">
        <h2>Best selling</h2>
        <p>Speaker</p>
    </div>
    <div class="products-container">
        @foreach ($products as $product)
            <x-product id="{{ $product->id }}" 
                media-link="{{ $product->media_link }}" 
                name="{{ $product->name }}" 
                price="{{ $product->price }}" />
        @endforeach
    </div>
</x-app-layout>
