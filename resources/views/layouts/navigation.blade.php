<div class="navbar-container">
    <div>
        <div class="flex items-center shrink-0">
            <p>
                <a href="/">Naiki</a>
            </p>
        </div>
    </div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <ul class="flex flex-row gap-4">
                <li>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                <div>{{ __('Brand') }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="flex flex-row gap-4 px-4 py-4">
                                <div style="width: 200px;">
                                    <a href="/" class="py-4">
                                        {{ __('Best seller')}}
                                    </a>
                                    <ul class="mx-4">
                                        <li>
                                            <a href="/" class="hover:text-gray-700">
                                                Adidas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/" class="hover:text-gray-700">
                                                Nike
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/" class="hover:text-gray-700">
                                                Converse
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div style="width: 200px;">
                                    <a href="/" class="py-4">
                                        {{ __('New brand')}}
                                    </a>
                                    <ul class="mx-4">
                                        <li>
                                            <a href="/" class="hover:text-gray-700">
                                                Comme des Garcons
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </x-slot>
                    </x-dropdown>
                </li>
                <li>
                    <a href="/about-us">
                        {{ __('About us')}}
                    </a>
                </li>
                <li>
                    <form action="{{ route('product.search') }}" method="GET" class="flex item-center">
                        <input type="text" name="keyword" placeholder="Search products..." class="border border-gray-300 rounded-l px-4 py-2">
                        <button type="submit" class="bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-r">{{ __('Search')}}</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="flex">
        <a href="{{ route('favourite.index') }}" class="cart-icon mx-5">
            <button type="button">
                <svg stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 fill-current absolute top-0 left-0"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512">
                    <path d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z" />
                </svg>
                @if ($favouriteItemCount > 0)
                    <span class="cart-item-qty left-3">{{ $favouriteItemCount }}</span>
                @endif
            </button>
        </a>
        <a href="{{ route('cart.index') }}">
            <button type="button" class="mx-4 cart-icon">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 file:">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                @if ($cartItemCount > 0)
                    <span class="cart-item-qty left-3">{{ $cartItemCount }}</span>
                @endif
            </button>
        </a>
        @if( Auth::check())
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                    <div>{{ Auth::user()->fullname }}</div>
                    <div class="ml-1">
                        <svg class="w-4 h-4 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">

                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('bill.index')">
                    {{ __('Bill History') }}
                </x-dropdown-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
        @else
        <a href="/login" class="mx-4">
            {{ __('Login') }}
        </a>
        <a href="/register">
            {{ __('Register') }}
        </a>
        @endif
    </div>
</div>
