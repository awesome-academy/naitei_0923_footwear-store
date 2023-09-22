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
            <span class="text-md font-medium">{{ $quantity }}</span>
        </div>
        <div class="pr-8 ">
            <span class="text-md font-medium text-red-500" id="fullprice-{{ $id }}">{{ $fullPrice }}</span>
        </div>
        <div>
            <i class="fa fa-close text-xs font-medium"></i>
        </div>
    </div>
</div>
