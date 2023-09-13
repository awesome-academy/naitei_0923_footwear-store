<div>
    <div class="footer-banner-container">
        <div class="banner-desc">
            <div class="left">
                <p>{{ $discount }}</p>
                <h3>{{ $largeText1 }}</h3>
                <h3>{{ $largeText2 }}</h3>
                <p>{{ $saleTime }}</p>
            </div>
            <div class="right">
                <p>{{ $smallText }}</p>
                <h3>{{ $midText }}</h3>
                <p>{{ $desc }}</p>
                <a href="/product/${{ $product }}">
                    <button type="button">Shop now</button>
                </a>
            </div>
            <div class="payment">
                <img class="my-2" src="{{ asset($image) }}" alt="{{$desc}}" width="80" height="10">
                <img class="my-2" src="{{ asset('storage/images/logo/visa.png') }}" alt="{{$desc}}" width="80" height="10">
                <img class="my-2" src="{{ asset('storage/images/logo/american.png') }}" alt="{{$desc}}" width="80" height="10">
                <img class="my-2" src="{{ asset('storage/images/logo/MasterCard.svg.png') }}" alt="{{$desc}}" width="80" height="10">
                <img class="my-2" src="{{ asset('storage/images/logo/Stripe.webp') }}" alt="{{$desc}}" width="80" height="10">
            </div>
        </div>
    </div>
</div>
