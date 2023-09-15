<div class="hero-banner-container">
    <div>
        <p class="beats-solo">{{ $smallText }}</p>
        <h3>{{ $midText }}</h3>
        <h1>{{ $largeText1 }}</h1>
        <img src="{{ asset($image) }}" alt="headphones" class="hero-banner-image" />
        <div>
            <a href='/'>
                <button type="button">{{ __('Shop Now') }}</button>
            </a>
            <div class="desc">
                <h5>{{ __('Description') }}</h5>
                <p>{{ $desc }}</p>
            </div>
        </div>
    </div>
</div>
