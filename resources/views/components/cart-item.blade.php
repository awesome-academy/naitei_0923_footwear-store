<div class="flex justify-between items-center mt-6 pt-6">
    <a href="{{ route('product.show',['id' => $productId ])}}" class="flex items-center">
        <img src="{{ asset($mediaLink) }}" class="small-image">
        <div class="flex flex-col ml-3">
            <span class="md:text-md font-medium">{{ __($name) }}</span>
        </div>
    </a>
    <div class="flex justify-center items-center">
        <div class="pr-8 ">
            <span class="text-md font-medium">{{ $price }}</span>
        </div>
        <div class="pr-8 flex ">
            <span class="font-semibold focus:outline-none bg-gray-100 border border-black h-6 w-8 text-md px-2">
                <button class="w-full" onclick="$global.decreaseQuantity('{{ $id }}')">-</button>
            </span>
            <input type="text" name="quantity" id="{{ $id }}" class="focus:outline-none bg-gray-100 border h-6 w-8 text-md px-2" value="{{ $quantity }}">
            <span class="font-semibold focus:outline-none bg-gray-100 border border-black h-6 w-8 text-md px-2">
                <button class="w-full" onclick="$global.increaseQuantity('{{ $id }}')">+</button>
            </span>
        </div>
        <div class="pr-8 ">
            <span class="text-md font-medium text-red-500" id="fullprice-{{ $id }}">{{ $fullPrice }}</span>
        </div>
        <div class="pr-8 ">
            <form method="post" action="{{ route('cart.destroy', ['id' => $id ]) }}">
                @csrf
                @method('POST')
                <span class="text-xs font-medium px-[12px] py-[10px] bg-red-500 text-white border-none rounded-md hover:bg-red-700">
                    <button type="submit">
                        {{ __('Remove') }}
                    </button>
                </span>
            </form>
        </div>
        <div>
            <i class="fa fa-close text-xs font-medium"></i>
        </div>
    </div>
</div>
