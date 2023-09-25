<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('product.indexAdmin') }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('product.update' ,['product' => $product]) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-label for="brand" :value="__('Brand')" />
                                <x-input id="brand" name="brand" type="text" class="block w-full mt-1" :value="old('brand', $product->brand)" required autofocus autocomplete="brand" />
                                <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                            </div>

                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="w-full max-w-xs form-control">
                                @if($product->productMedias->count() != 0)
                                    <x-label for="big_image" :value="__('Your current thumbnail image')" />
                                    <img src="<?php echo asset($product->productMedias->where('type', 'big image')->first()->media_link) ?>" />
                                @else
                                    {{__('This product don\'t have a thumbnail image')}}
                                @endif
                                <x-label for="big_image" :value="__('Attach a new thumbnail for your product')" />
                                <x-input class="block w-full mt-1 form-control-file" type="file" accept="image/*" name="big_image" id="big_image" />                                
                                <x-input-error class="mt-2" :messages="$errors->get('big_image')" />
                            </div>

                            <div class="w-full max-w-xs form-control">
                                @if ($product->productMedias->where('type','small image')->count() == 0)
                                    {{__('This product don\'t have any detail images')}}                                
                                @else
                                    <x-label for="small_image" :value="__('Your current detail images')" />
                                    @foreach($product->productMedias->where('type','small image') as $productMedia)
                                        <img src="<?php echo asset($productMedia->media_link) ?>" />
                                    @endforeach
                                @endif
                                <x-label for="small_image" :value="__('Attach new details images for your product')" />
                                <x-input class="block w-full mt-1 form-control-file" type="file" accept="image/*" name="small_image[]" id="small_image" multiple />                                
                                <x-input-error class="mt-2" :messages="$errors->get('small_image')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'product-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                        @if (session('status') === 'product-deleted')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Product is created.') }}</p>
                            @endif
                            <h2 class="text-lg font-medium text-gray-900 ">
                                {{ __('Delete product') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once this product is deleted, all of its resources and data will be permanently deleted. Before deleting a product, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>

                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')">{{ __('Delete this product') }}</x-danger-button>

                        <x-modal name="confirm-product-deletion" :show="$errors->productDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete this product?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once this product is deleted, all of its resources and data will be permanently deleted.') }}
                                </p>

                                <div class="flex justify-end mt-6">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ml-3">
                                        {{ __('Delete this product') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
