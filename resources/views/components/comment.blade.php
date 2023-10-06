<div class="product-comment-main border-b border-black py-4">
    <div class="product-comment-author">{{ $username }}</div>
    <div class="repeat-purchase-con">
        <div class="flex items-center">
            @for ($i=0; $i < $rating; $i++)
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
            @endfor
            @for ($i=$rating; $i < config('app.max_point'); $i++ )
                <svg class="half-filled-star stroke-yellow-300 w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="yellow-300" stroke-width="2px" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
            @endfor
        </div>
    </div>
    <div class="product-rating-time my-2 text-sm text-gray-500">
        {{ $time }}
    </div>
    <div class="relative my-2 font-sm leading-6 text-black w-full">
        {{ $comment }}
    </div>
</div>
