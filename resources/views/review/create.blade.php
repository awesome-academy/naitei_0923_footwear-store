<x-app-layout>
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Comment for') }} "{{ $product->name }}"
    </h1>
    <form action="{{ route('review.store', ['billId' => $billId, 'id' => $product->id]) }}" method="POST" class="w-full max-w-sm mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
                {{ __('Comment') }}
            </label>
            <textarea name="comment" rows="4" cols="50" placeholder="Enter your comment" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="point">
                {{ __('Rating (0-10)') }}
            </label>
            <input type="number" name="point" id="point" min="0" max="10" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Submit Comment') }}
        </button>
    </form>
</x-app-layout>
