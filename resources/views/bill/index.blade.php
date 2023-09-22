<x-app-layout>
    <h1 class="font-bold text-xl text-black dark:text-gray-200">
        {{ __('Bill History') }}
    </h1>
    <table class="table w-full border-collapse">
        <thead>
            <tr>
            <th class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white py-2 px-4">#</th>
            <th class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white py-2 px-4">{{ __('Date') }}</th>
            <th class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white py-2 px-4">{{ __('Total  ($)') }}</th>
            <th class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white py-2 px-4">{{ __('Status') }}</th>
            <th class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white py-2 px-4">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $index => $bill)
            <tr>
                <td class="border py-2 px-4 dark:bg-gray-800 text-gray-900 dark:text-white text-center">{{ $index + 1 }}</td>
                <td class="border py-2 px-4 dark:bg-gray-800 text-gray-900 dark:text-white text-center">{{ $bill->date }}</td>
                <td class="border py-2 px-4 dark:bg-gray-800 text-gray-900 dark:text-white text-center">{{ $bill->total }}</td>
                <td class="border py-2 px-4 dark:bg-gray-800 text-gray-900 dark:text-white text-center">{{ $bill->status }}</td>
                <td class="border py-2 px-4 dark:bg-gray-800 text-gray-900 dark:text-white text-center">
                    <x-nav-link :href="route('bill.show', ['bill' => $bill->id])">
                        <x-primary-button class="mt-4">
                            {{ __("Show") }}
                        </x-primary-button>
                    </x-nav-link>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
