<div class="navbar-container">
    <div>
        <div class="shrink-0 flex items-center">
            <p>
                <a href="/">Naiki</a>
            </p>
        </div>
    </div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="flex flex-row gap-4">
                <li>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ __('Brand') }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4"
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
            </ul>
        </div>
    </nav>
    <div class="flex">
        @if( Auth::check())
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>{{ Auth::user()->fullname }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4"
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
        <button type="button" class="cart-icon mx-4">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="file: h-6 w-6">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
            </svg>
            <span class="cart-item-qty">3</span>
        </button>
    </div>
</div>
