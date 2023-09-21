<x-admin-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('users.create') }}">
                    <x-primary-button>{{ __('Create a new admin user') }}</x-primary-button>
                </a>
            </div>
            <livewire:users-table-view />
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('status') === 'user-deleted')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('User is deleted.') }}</p>
            @endif
        </div>
    </div>
</x-admin-layout>
