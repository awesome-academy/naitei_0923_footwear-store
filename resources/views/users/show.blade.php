<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:user-detail-view :model="$user->id" />
                </div>
            </div>
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <x-label :value="__('Order history')" />
                            <table class="min-w-full text-sm font-light text-center">
                                <thead class="font-medium border-b dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">{{ __('#') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Date') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Total') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Payment') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Shipping method') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Status') }}</th>
                                        <th scope="col" class="px-6 py-4">{{ __('Address') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->bills->sortBy('date') as $key => $bill)
                                    <tr class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap"><a href="{{ route('order.showAdmin', ['bill' => $bill]) }}"> {{ __($bill->id) }} </a></td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap"> {{ __($bill->date->format('Y-m-d')) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($bill->total) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($bill->payment_method) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($bill->shipping_method) }}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{!! $bill->status_tag !!}</td>
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($bill->address) }}</td>
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
