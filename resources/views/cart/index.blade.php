<x-app-layout>
    <x-slot name='slot'>
        <div class="py-12">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="">
                            <div class="col-span-2 p-5">
                                <h2 class="text-xl font-medium ">
                                    {{ __('Shopping Cart') }}
                                    @if($status = Session::get('status') === true)
                                        <button x-data="{ open: true }">
                                            <span class="text-red-500 font-medium text-lg mx-5" 
                                                x-show="open" 
                                                @click="open = !open">
                                                {{ __(Session::get('message')) }}
                                            </span>
                                        </button>
                                    @endif
                                </h2>
                                @foreach($cartItems as $cartItem)
                                    <x-cart-item id="{{ $cartItem->id }}" 
                                        product-id="{{ $cartItem->product_id }}" 
                                        name="{{ $cartItem->name }}" 
                                        price="{{ $cartItem->price }}" 
                                        quantity="{{ $cartItem->quantity }}" 
                                        media-link="{{ $cartItem->media_link }}" />
                                @endforeach
                                <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                    <div class="flex justify-center items-end">
                                        <span class="text-sm font-medium text-gray-400 mr-1">{{ _('Subtotal') }}: $</span>
                                        <span class="text-lg font-bold text-gray-800 " id="sub-total"> {{$subTotal}}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fa fa-arrow-left text-sm pr-2"></i>
                                        <span class="btn ">{{ _('Check out') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
