<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search Results for') }} "{{ $query }}"
        </h2>
    </x-slot>

    @if ($products->count() > 0)
        <div class="products-container">
            @foreach ($products as $product)
                <x-product id="{{ $product->id }}" 
                    media-link="{{ $product->media_link }}" 
                    name="{{ $product->name }}" 
                    price="{{ $product->price }}" />
            @endforeach
        </div>
    @else
        <p>{{ __('No results found.') }} </p>
    @endif
</x-app-layout>
