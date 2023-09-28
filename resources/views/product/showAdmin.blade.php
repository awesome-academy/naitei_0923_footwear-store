<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('product.indexAdmin') }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('productInStocks.create', ['product' => $product]) }}">
                    <x-primary-button>{{ __('Add products to stock') }}</x-primary-button>
                </a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:product-detail-view :model="$product->id" />
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
