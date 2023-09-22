<x-app-layout>
    <x-slot name='slot'>
        <div class="pt-12 pb-2">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full px-5 py-2">
                        <div class="p-5">
                            <div class="flex gap-2 text-red-500 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <h2 class="text-xl font-medium ">
                                    {{ __('Address')}}
                                </h2>
                            </div>
                            <div class="py-5 items-center ">
                                <div class="grid grid-cols-4 text-base gap-2 relative">
                                    <span class="font-bold">{{ $name }}</span>
                                    <span class="mx-4 break-all col-span-2"> {{ $address }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full px-5 py-2">
                        <div class="p-5">
                            <div class="flex gap-2 justify-between text-red-500 items-center">
                                <h2 class="text-xl font-medium pr-8">
                                    {{ __('Products Ordered')}}
                                </h2>
                                <div class="text-xl pr-8">{{ __('Price') }}</div>
                                <div class="text-xl pr-8">{{ __('Quantity')}}</div>
                                <div class="text-xl pr-8">{{ __('Subtotal')}}</div>
                            </div>
                            @foreach ($orderItems as $item)
                            <div class="flex justify-between items-center mt-6 pt-6">
                                <div class="flex items-center">
                                    <img src="{{ asset($item->media_link) }}" class="small-image">
                                    <div class="flex flex-col ml-3">
                                        <span class="md:text-md font-medium">{{ __($item->name) }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="pr-8 ">
                                        <span class="text-md font-medium">{{ $item->price }}</span>
                                    </div>
                                </div>
                                <div class="pr-8 ">
                                    {{ $item->quantity }}
                                </div>
                                <div class="justify-center">
                                    <div class="pr-8 ">
                                        <span class="text-md font-medium text-red-500">{{ $item->sub_total }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex justify-center items-end">
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Shipping fee') }}: $</span>
                                    <span class="text-lg font-bold text-gray-800"> {{ $shippingFee }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full px-5 py-2">
                        <form action="{{ route('order.store',['total' => $totalPayment]) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="grid grid-cols-4 p-5">
                                <div class="flex text-red-500">
                                    <h2 class="text-xl font-medium pr-8">
                                        {{ __('Payment method')}}
                                    </h2>
                                </div>
                                <div class="col-span-2"></div>
                                <div>
                                    <select name="payment_method" id="payment_method">
                                        @foreach ($paymentMethods as $payment => $method)
                                            <option value="{{ $payment }}">{{ __($method) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-4 p-5">
                                <div class="col-span-3"></div>
                                <div>
                                    <div class="text-lg font-medium mr-1">
                                        <span class="text-gray-400">{{ __('Bill total') }} :</span>
                                        <span class="font-bold"> ${{ $billTotal }}</span>
                                    </div>
                                    <div class="text-lg font-medium mr-1">
                                        <span class="text-gray-400">{{ __('Shipping Fee') }} : </span>
                                        <span class="font-bold"> ${{ $shippingFee }}</span>
                                    </div>
                                    <div class="text-lg font-medium mr-1">
                                        <span class="text-gray-400">{{ __('Total payment') }} : </span>
                                        <span class="font-bold text-red-500"> ${{ $totalPayment }}</span>
                                    </div>
                                    <div class="py-5">
                                        <button type="submit" class="btn">
                                            <span>{{ _('Place Order') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
