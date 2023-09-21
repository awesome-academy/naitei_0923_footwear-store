<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 pb-4">
                <a href="{{ route('users.index') }}">
                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                </a>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('users.update' ,['user' => $user]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-label for="first-name" :value="__('First name')" />
                                <x-input id="first-name" name="first_name" type="text" class="block w-full mt-1" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                            </div>

                            <div>
                                <x-label for="last-name" :value="__('Last name')" />
                                <x-input id="last-name" name="last_name" type="text" class="block w-full mt-1" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                            </div>

                            <div>
                                <x-label for="username" :value="__('Username')" />
                                <x-input id="username" name="username" type="text" class="block w-full mt-1" :value="old('username', $user->username)" required autofocus autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('username')" />
                            </div>

                            <div>
                                <x-label for="address" :value="__('Address')" />
                                <x-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user->address)" required autofocus autocomplete="address" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <div>
                                <x-label for="phone" :value="__('Phone')" />
                                <x-input id="phone" name="phone" type="tel" class="block w-full mt-1" :value="old('phone', $user->phone)" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" required autofocus autocomplete="phone" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'user-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </form>
                    </section>
                </div>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 ">
                                {{ __('Delete user') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once this user is deleted, all of its resources and data will be permanently deleted. Before deleting a user, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>

                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('users.destroy', ['user' => $user]) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete this user?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once this user is deleted, all of its resources and data will be permanently deleted.') }}
                                </p>

                                <div class="flex justify-end mt-6">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ml-3">
                                        {{ __('Delete this user') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
