<x-lv-layout>
  {{-- Search input and filters --}}
  <div class="px-4">
    @include('laravel-views::components.toolbar.toolbar')
  </div>

  <div>
    @foreach ($items as $item)
      <div class="flex items-center border-b border-gray-200 ">
        @if ($this->hasBulkActions)
          <div class="flex items-center h-full pl-3 md:pl-4">
            <x-lv-checkbox wire:model="selected" value="{{ $item->getKey() }}" />
          </div>
        @endif
        <div class="flex-1 px-3 py-2 md:px-4">
          <x-lv-dynamic-component :view="$itemComponent" :data="array_merge($this->data($item), ['actions' => $actionsByRow, 'model' => $item])" />
        </div>
      </div>
    @endforeach
  </div>

  {{-- Paginator, loading indicator and totals --}}
  <div class="px-4 mt-8">
    {{ $items->links() }}
  </div>
</x-lv-layout>
