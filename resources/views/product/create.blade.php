<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('product.indexAdmin') }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <x-label :value="__('Create a new product)" />
                <div class="max-w-xl">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('POST')

                        <div>
                            <x-label for="brand" :value="__('Brand')" />
                            <x-input id="brand" class="block w-full mt-1" type="text" name="brand" :value="old('brand')" placeholder="Nike, Adidas, Converse, ..." required autofocus autocomplete="brand" />
                            <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                        </div>

                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" placeholder="" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="w-full max-w-xs form-control">
                            <x-label for="big_image" :value="__('Attach a thumbnail for your product')" />
                            <x-input class="block w-full mt-1 form-control-file" type="file" accept="image/*" name="big_image" id="big_image" />
                            <x-input-error class="mt-2" :messages="$errors->get('big_image')" />
                        </div>

                        <div class="w-full max-w-xs form-control">
                            <x-label for="small_image" :value="__('Attach a details media for your product')" />
                            <x-input class="block w-full mt-1 form-control-file" type="file" accept="image/*" name="small_image[]" id="small_image" multiple />
                            <x-input-error class="mt-2" :messages="$errors->get('small_image')" />
                        </div>

                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />

                        <div class="flex items-center mt-4">
                            <x-button class="flex items-center gap-4">
                                {{ __('Create') }}
                            </x-button>
                            @if (session('status') === 'product-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ml-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Product is created.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
