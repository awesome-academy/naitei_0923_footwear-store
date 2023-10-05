<div>
    <a href="{{ route('product.show',['id' => $id, 'type' => $type, 'color' => $color, 'gender' => $gender]) }}">
        <div class="product-card">
            <img src="{{ asset($mediaLink) }}" alt="{{ $name }}" width="250" height="250" class="product-image">
            <p class="product-price"> {{ $name }} </p>
            <p class="product-name"> {{ __($gender . "'s shoes")}} </p>
            <p class="product-price"> $ {{ $price }}</p>
        </div>
    </a>
</div>
