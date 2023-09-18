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

    <div class="my-[40px]">
        <x-hero-banner small-text="Brand new" 
            mid-text="Comme des Garcons" 
            large-text-1="SMILE" 
            desc="Comme des Garcons" 
            image="storage/images/brands_logo/Comme des Garcons.jpg" />
    </div>
    <div class="products-heading">
        <h2>Comme des Garcons</h2>
        <p>Brand new</p>
    </div>
    <div class="products-container">
        @foreach ($commeShoes as $product)
        <x-product id="{{ $product->id }}" 
            media-link="{{ $product->media_link }}" 
            name="{{ $product->name }}" 
            price="{{ $product->price }}" />
        @endforeach
    </div>
</x-app-layout>