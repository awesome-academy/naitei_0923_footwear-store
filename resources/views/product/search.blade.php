<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Search Results for') }} "{{ $keyword }}"
    </h2>

    @if ($products->count() > 0)
        <form action="{{ route('product.search') }}" method="GET" class=filter-form>
            <div class=filter-group>
                <label for="keyword">{{ __('Keyword:') }}</label>
                <input type="text" id="keyword" name="keyword" value={{ $keyword }} readonly>
            </div>
            <div class=filter-group>
                <label for="gender">{{ __('Gender:') }}</label>
                <select name="gender" id="gender">
                    <option value="">{{__('All') }}</option>
                    <option value="male" {{ request()->gender == 'male' ? 'selected':false }}>{{ __('Male') }}</option>
                    <option value="female" {{request()->gender == 'female' ? 'selected':false }}>{{ __('Female') }}</option>
                </select>
            </div>

            <div class=filter-group>
                <label for="price">{{ __('Price:') }}</label>
                <select name="price" id="price">
                    <option value="">{{ __('Any') }}</option>
                    <option value="lt_50" {{ request()->price == 'lt_50' ? 'selected':false }}>{{ __('Less than $50') }}</option>
                    <option value="50_200" {{ request()->price == '50_200' ? 'selected':false }}>{{ __('$50 - $200') }}</option>
                    <option value="200_500" {{ request()->price == '200_500' ? 'selected':false }}>{{ __('$200 - $500') }}</option>
                    <option value="gt_500" {{ request()->price == 'gt_500' ? 'selected':false }}>{{ __('More than $500') }}</option>
                </select>
            </div>

            <div class=filter-group>
                <label for="color">{{ __('Color:') }}</label>
                <select name="color" id="color">
                    <option value="">{{__('Any') }}</option>
                    <option value="red" {{ request()->price == 'red' ? 'selected':false }}>{{ __('Red') }}</option>
                    <option value="blue" {{ request()->price == 'blue' ? 'selected':false }}>{{ __('Blue') }}</option>
                </select>
            </div>

            <div class=filter-group>
                <label for="size">{{ __('Size:') }}</label>
                <select name="size" id="size">
                    <option value="">{{__('Any') }}</option>
                    @php
                        $sizeRanges = config('app.size_ranges');
                    @endphp
                    @foreach ($sizeRanges as $key => $value)
                        <option value="{{ $value }}" {{ request()->size == $value ? 'selected':false }}>{{ $key }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-r">{{ __('Filter')}}</button>
        </form>

        <div class="products-container">
            @foreach ($products as $product)
                <x-product id="{{ $product->id }}" 
                    media-link="{{ $product->media_link }}" 
                    name="{{ $product->name }}" 
                    price="{{ $product->price }}" 
                    color="{{ $product->color }}"
                    gender="{{ $product->gender }}"
                    type="{{ $product->type }}" />
            @endforeach
        </div>
    @else
        <p>{{ __('No results found.') }} </p>
    @endif
</x-app-layout>
