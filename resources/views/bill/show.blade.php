<x-app-layout>
    <x-slot name='slot'>
        <div class="py-12">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="">
                            <div class="col-span-2 p-5">
                                <h1 class="text-xl font-medium ">{{ __('Bill Detail') }}</h1>
                                @foreach($billItems as $billItem)
                                    <x-bill-item id="{{ $billItem->id }}" 
                                        product-id="{{ $billItem->product_id }}" 
                                        name="{{ $billItem->name }}" 
                                        price="{{ $billItem->price }}" 
                                        quantity="{{ $billItem->quantity }}" 
                                        media-link="{{ $billItem->media_link }}" />
                                @endforeach
                            </div>
                            <div class="grid grid-cols-1 gap-y-10 mt-6 pt-6 border-t"> 
                                <div class="flex justify-start items-center"> 
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Shipping Method') }}: </span>
                                    <span class="text-lg font-bold text-gray-800">{{ $billInfo->shipping_method }}</span>
                                </div>
                                <div class="flex justify-start items-center">
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Payment Method') }}: </span>
                                    <span class="text-lg font-bold text-gray-800">{{ $billInfo->payment_method }}</span>
                                </div>
                                <div class="flex justify-start items-center">
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Address') }}: </span>
                                    <span class="text-lg font-bold text-gray-800">{{ $billInfo->address }}</span>
                                </div>
                                <div class="flex justify-start items-center">
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Date') }}: </span>
                                    <span class="text-lg font-bold text-gray-800">{{ $billInfo->date }}</span>
                                </div>
                                <div class="flex justify-start items-center">
                                    <span class="text-lg font-medium text-gray-400 mr-1">{{ _('Total') }}: $</span>
                                    <span class="text-lg font-bold text-gray-800">{{ $billInfo->total }}</span>
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <button class="bg-red-500 text-lg font-bold text-white py-2 px-4 rounded">{{ $billInfo->status }}</button>
                            </div>
                            @if ($billInfo->status === 'Pending')
                                    <div class="flex justify-center items-center mt-4">
                                        <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Cancelled') }}
                                        </button>
                                    </div>
                                @elseif ($billInfo->status === 'Shipping')
                                    <div class="flex justify-center items-center mt-4">
                                        <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Shipped') }}
                                        </button>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
