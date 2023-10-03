<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('product.showAdmin', ['product' => $product]) }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                <x-label :value="__('Add '  . $product->name . ' to stock')" />
                    <form method="POST" action="{{ route('productInStocks.store', ['product' =>  $product]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('POST')

                        <div>
                            <x-label for="size" :value="__('Size')" />
                            <x-input id="size" class="block w-full mt-1" type="number" min="10" max="100" name="size" :value="old('size')" required autofocus autocomplete="size" />
                            <x-input-error class="mt-2" :messages="$errors->get('size')" />
                        </div>

                        <div> 
                            <x-label for="type" :value="__('Type')" />
                            <x-input id="type" class="block w-full mt-1" type="text" name="type" :value="old('type')" required autofocus autocomplete="type" />
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-label for="color" :value="__('Color')" />
                            <x-input id="color" class="block w-full mt-1" type="color" name="color" :value="old('color')" required autofocus autocomplete="color" />
                            <x-input-error class="mt-2" :messages="$errors->get('color')" />
                        </div>

                        <div>
                            <x-label for="gender" :value="__('Gender')" />
                            <x-input id="gender" class="block w-full mt-1" type="text" name="gender" :value="old('gender')" required autofocus autocomplete="gender" />
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>

                        <div>
                            <x-label for="price" :value="__('Price')" />
                            <x-input id="price" class="block w-full mt-1" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-label for="quantity" :value="__('Quantity')" />
                            <x-input id="quantity" class="block w-full mt-1" type="number" min="0" max="100000" name="quantity" :value="old('quantity')" required autofocus autocomplete="quantity" />
                            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                        </div>

                        <div class="flex items-center mt-4">
                            <x-button class="flex items-center gap-4">
                                {{ __('Create') }}
                            </x-button>
                            @if (session('status') === 'product-in-stock-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ml-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Product was added to the stock.') }}</p>
                            @elseif (session('status') === 'product-in-stock-already-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ml-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Product has already be in the stock. Please update instead of create.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
