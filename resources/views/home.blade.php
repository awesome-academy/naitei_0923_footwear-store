<x-app-layout>
    <x-hero-banner small-text="Beat Solo Air" mid-text="Summer Sale" large-text-1="FINE" desc="Beats Solo Air" image='storage/images/brands_logo/black-shoes.png' />
    <div class="products-heading">
        <h2>{{ __('Best selling') }}</h2>
        <p>{{ __('Sneaker') }}</p>
    </div>
    <div class="products-container">
        <div class="swiper-container">
            <div class="container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <x-product id="{{ $product->id }}"
                                    media-link="{{ $product->media_link }}"
                                    name="{{ $product->name }}"
                                    price="{{ $product->price }}" 
                                    color="{{ $product->color }}"
                                    gender="{{ $product->gender }}"
                                    type="{{ $product->type }}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
