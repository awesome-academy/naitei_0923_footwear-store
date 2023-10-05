<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('order.indexAdmin') }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('error') === 'cant-perform')
                    <div>
                        <div class="font-medium text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                            {{ __("This order's status is not valid to perform that action")}}
                        </ul>
                    </div>
                    @endif
                    @if (session('bill-status') === 'status-updated')
                    <div>
                        <div class="font-medium text-green-600">
                            {{ __('Updated!') }}
                        </div>

                        <ul class="mt-3 text-sm text-green-600 list-disc list-inside">
                            {{ __("This order's status is updated")}}
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:order-detail-view :model="$bill->id" />
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <x-label :value="__('Order details')" />
                            <table class="min-w-full text-sm font-light text-center">
                                <thead class="font-medium border-b dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">{{ __('#') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Brand') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Name') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Color') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Size') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Type') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Gender') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Price') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Order quantity') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill->billProducts as $key => $billProduct)
                                    <tr class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($key + 1) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap"> {{ __($billProduct->productInStock->product->brand) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap"> {!! UI::link($billProduct->productInStock->product->name,route('product.showAdmin', ['product' => $billProduct->productInStock->product->id])) !!} </td>
                                        <td class="px-6 py-4 whitespace-nowrap" bgcolor="{{ $billProduct->productInStock->color }}"></td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->productInStock->size) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->productInStock->type) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->productInStock->gender) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->productInStock->price) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->quantity) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($billProduct->quantity * $billProduct->productInStock->price) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
