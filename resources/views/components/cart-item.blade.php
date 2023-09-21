<div class="flex justify-between items-center mt-6 pt-6">
    <a href="" class="flex  items-center">
        <img src="{{ asset('storage/images/Adidas/9999202991449_1_8.jpg')}}" class="small-image">
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
                <button class="w-full">-</button>
            </span>
            <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 text-md px-2" value="{{ $quantity }}">
            <span class="font-semibold focus:outline-none bg-gray-100 border border-black h-6 w-8 text-md px-2">
                <button class="w-full">+</button>
            </span>
        </div>
        <div class="pr-8 ">
            <span class="text-md font-medium text-red-500">{{ $fullPrice }}</span>
        </div>
        <div class="pr-8 ">
            <span class="text-xs font-medium px-[12px] py-[10px] bg-red-500 text-white border-none rounded-md hover:bg-red-700">Remove</span>
        </div>
        <div>
            <i class="fa fa-close text-xs font-medium"></i>
        </div>
    </div>
</div>
