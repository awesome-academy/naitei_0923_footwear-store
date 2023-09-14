<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First name -->
            <div>
                <x-label for="first-name" :value="__('First name')" />
                <x-input id="first-name" class="block w-full mt-1" type="text" name="first_name" :value="old('first_name')" placeholder="John" required autofocus autocomplete="first_name" />
            </div>

            <!-- Last name -->
            <div>
                <x-label for="last-name" :value="__('Last name')" />
                <x-input id="last-name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')" placeholder="Doe" required autofocus autocomplete="last_name" />
            </div>

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('User name')" />
                <x-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')" placeholder="johndoe123" required autofocus autocomplete="username" />
            </div>

            <!-- Phone -->
            <div>
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block w-full mt-1" type="tel" name="phone" :value="old('phone')" placeholder="8888888888" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" required autofocus autocomplete="phone" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" placeholder="johndoe@abczyx.org" :value="old('email')" required />
            </div>

            <!-- Address -->
            <div>
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" placeholder="1, Dai Co Viet St, Hai Ba Trung, Ha Noi" required autofocus autocomplete="address" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <div class="flex mt-1 mb-2">
                    <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                        <input class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" :type="show ? 'password' : 'text'" name="password" required autocomplete="new-password" />

                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                            <!-- Heroicon name: eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                            <!-- Heroicon name: eye-slash -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <div class="flex mt-1 mb-2">
                    <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                        <input class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password_confirmation" :type="show ? 'password' : 'text'" name="password_confirmation" required />

                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                            <!-- Heroicon name: eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                            <!-- Heroicon name: eye-slash -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
