<x-app-layout>
    <x-slot name="slot">
        <div>
            <div class="product-detail-container">
                <div>
                    <div class="image-container">
                        <div class="grid grid-cols-4 text-base gap-2 relative">
                            @foreach ($smallImages as $image)
                                <div class="col-span-2">
                                    <img src="{{ asset($image) }}" alt="images" class="product-detail-image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-detail-desc">
                    <h1>{{ $name }}</h1>
                    <div class="reviews">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </div>
                    </div>
                    <p class="price">$ {{ $price }}</p>
                    <form method="post" action="{{ route('product.addToCart',[ 'id' => $id, 'type' => $type, 'color' => $color, 'gender' => $gender ]) }}">
                        @csrf
                        @method('POST')
                        <div class="info-container flex">
                            <h3 class="py-2 text-base">{{ __('Color') }}: </h3>
                            <div class="py-2 px-4">
                                {{ __($color) }}
                            </div>
                        </div>
                        <div class="info-container flex">
                            <h3 class="py-2 text-base">{{ __('Gender') }}: </h3>
                            <div class="py-2 px-4">
                                {{ __($gender) }}
                            </div>
                        </div>
                        <div class="info-container flex">
                            <h3 class="py-2 text-base">{{ __('Type') }}:</h3>
                            <div class="py-2 px-4">
                                <span>{{ __($type) }}</span>
                            </div>
                        </div>
                        <div>
                            <h4>{{ __('Size') }}</h4>
                            <div class="grid gap-2 grid-cols-4">
                                @foreach (config('app.size_ranges') as $size)
                                    <div class="radio-button">
                                        <input class="visually-hidden h-full" type="radio" value="{{ $size }}" name="size" id="size" {{ !$sizes->contains($size) ? 'disabled' : 'checked' }}>
                                        <label class="label" for="size">{{ $size }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="py-2">
                            <h3>{{ __('Quantity') }}</h3>
                            <div>
                                <input class="" type="number" name="quantity" id="quantity" value="1" min="1" max="12">
                            </div>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="buy-now">
                                <span>{{ __('Add to cart') }}</span>
                            </button>
                        </div>
                    </form>
                    <div class="buttons">
                        <form method="post" action="{{ route('favourite.addToFavourite', [ 'id' => $id, 'type' => $type, 'color' => $color, 'gender' => $gender ]) }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="add-to-cart" >
                                <span>
                                    {{ __('Favourite') }}
                                    <svg stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        @if ( !$isFavourite )
                                            <path d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z" />
                                        @else
                                            <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"/>
                                        @endif
                                    </svg>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
                @if($status = Session::get('status') === true)
                <div x-data="{ open: true }">
                    <div id="popup-modal" tabindex="-1" class="overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full" x-show="open">
                            <div class="relative rounded-lg border border-solid border-green-500">
                                <button type="button" class="absolute top-1 right-2 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center text-green-500" x-show="open" @click="open = !open">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                                <div class="p-6 text-center">
                                    <h3 class="text-lg font-normal text-green-500 dark:text-green-400">{{ __(Session::get('message')) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="maylike-products-wrapper">
                <h2>{{ __('You may also like') }}</h2>
                <div class="swiper-container" style="padding-left: 180px;">
                    <div class="container">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($suggestedProducts as $product)
                                    <div class="swiper-slide">
                                        <x-product id="{{ $product-> id}}"
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
        </div>
    </x-slot>
</x-app-layout>
