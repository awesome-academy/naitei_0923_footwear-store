<x-app-layout>
    <x-slot name='slot'>
        <div class="products-heading">
            <h2>{{ __('Favourite List') }}</h2>
            <p>{{ __('Sneaker') }}</p>
        </div>
        <div class="products-container">
            <div class="swiper-container">
                <div class="container">
                    <div class="swiper">
                        @if ($favouriteList->count() > 0)
                        <div class="swiper-wrapper">
                            @foreach ($favouriteList as $product)
                                <div class="swiper-slide">
                                    <x-product id="{{ $product->product_id }}"
                                        media-link="{{ $product->media_link }}"
                                        name="{{ $product->name }}"
                                        price="{{ $product->price }}"
                                        color="{{ $product->color }}"
                                        gender="{{ $product->gender }}"
                                        type="{{ $product->type }}" />
                                </div>
                            @endforeach
                            @else
                                <div class="text-xl font-medium py-5 flex justify-center">{{ __("You haven't add any item to your Favourite. Let's add something here") }}</div>
                                <div class="flex justify-center">
                                    <a href="{{ route('product.index') }}" class="btn text-center">
                                        <span>{{ _('Back to Shopping') }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
