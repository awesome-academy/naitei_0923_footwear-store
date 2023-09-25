<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('product.create') }}">
                    <x-primary-button>{{ __('Create a product') }}</x-primary-button>
                </a>
            </div>
            <livewire:products-grid-view />
        </div>
    </div>
</x-admin-layout>
