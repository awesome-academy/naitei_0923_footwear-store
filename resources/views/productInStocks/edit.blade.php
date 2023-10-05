<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('product.showAdmin', ['product' => $productInStock->product]) }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <x-label :value="__('Edit stock information: ' . $productInStock->product->name)" />
                <div class="max-w-xl">
                <section>
                        <form method="post" action="{{ route('productInStocks.update' ,['productInStock' => $productInStock]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-label for="size" :value="__('Size')" />
                                <x-input id="size" name="size" type="number" min="10" max="100" class="block w-full mt-1" :value="old('size', $productInStock->size)" required autofocus autocomplete="size" />
                                <x-input-error class="mt-2" :messages="$errors->get('size')" />
                            </div>

                            <div>
                                <x-label for="type" :value="__('Type')" />
                                <x-input id="type" name="type" type="text" class="block w-full mt-1" :value="old('type', $productInStock->type)" required autofocus autocomplete="type" />
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>

                            <div>
                                <x-label for="color" :value="__('Color')" />
                                <x-input id="color" name="color" type="color" class="block w-full mt-1" value="" :value="old('color', $productInStock->color)" required autofocus autocomplete="color" />
                                <x-input-error class="mt-2" :messages="$errors->get('color')" />
                            </div>

                            <div>
                                <x-label for="gender" :value="__('Gender: Male, Female, Unisex, Other')" />
                                <x-input id="gender" name="gender" type="text" class="block w-full mt-1" :value="old('gender', $productInStock->gender)" required autofocus autocomplete="gender" />
                                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                            </div>

                            <div>
                                <x-label for="price" :value="__('Price')" />
                                <x-input id="price" name="price" type="number" class="block w-full mt-1" :value="old('price', $productInStock->price)" required autofocus autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-label for="quantity" :value="__('Quantity')" />
                                <x-input id="quantity" name="quantity" type="number" min="0" max="100000" class="block w-full mt-1" :value="old('quantity', $productInStock->quantity)" required autofocus autocomplete="quantity" />
                                <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'product-in-stock-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @elseif (session('status') === 'product-in-stock-already-in-stock')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('You are updating this product to become a product has already be in the stock.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
