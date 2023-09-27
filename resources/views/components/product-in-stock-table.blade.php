@props(['headers' => '', 'rows' => '', 'route' => ''])
<div class="flex flex-col overflow-x-auto">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm font-light text-center">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            @foreach($headers as $header)
                            <th scope="col" class="px-6 py-4">{{ __($header) }}</th>
                            @endforeach
                            <th scope="col" class="px-6 py-4">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as  $row)
                        <tr class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                            <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($row->size) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ __($row->type) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap" bgcolor="{{ $row->color }}"></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ __($row->gender) }}</td>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($row->price) }}</td>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">{{ __($row->quantity) }}</td>
                            <th class="flex justify-center text-center text-gray-900 dark:text-gray-100">
                            <a href="{{route('productInStocks.edit', ['productInStock' =>  $row])}}">
                            <button class="p-1 text-gray-600 transition duration-150 ease-in-out border-2 border-transparent rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
  <i data-feather="edit" class="w-5 h-5"></i>
</button>
                            </a>
                            <form action="{{ route('productInStocks.destroy' ,['productInStock' => $row]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="p-1 text-gray-600 transition duration-150 ease-in-out border-2 border-transparent rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
  <i data-feather="delete" class="w-5 h-5"></i>
</button>
                            </form>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
