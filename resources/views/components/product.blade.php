<div>
    <a href="/product/{{ $id }}">
        <div class="product-card">
            <img src="{{ asset($mediaLink) }}" alt="{{ $name }}" width="250" height="250" class="product-image">
            <p class="product-name"> {{ $name }} </p>
            <p class="product-price"> $ {{ $price }}</p>
        </div>
    </a>
</div>
