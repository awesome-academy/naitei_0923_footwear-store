{{-- Filters dropdown --}}
@if (isset($filtersViews) && $filtersViews)
    {{-- Each filter view --}}
    @foreach ($filtersViews as $filter)
      {{-- Filter title --}}
      <x-lv-drop-down.header :label="$filter->getTitle()" />
      <div class="px-4 mt-4">
        {{-- Filter view --}}
        @include('laravel-views::components.filters.' . $filter->view, [
          'view' => $filter,
          'filter' => $filter,
        ])
      </div>
    @endforeach

    @if (count($filters) > 0)
      {{-- Clear filters button --}}
      <div class="flex justify-end p-4 text-right bg-gray-100">
        <button wire:click.prevent="clearFilters" @click="open = false" class="flex items-center text-sm text-gray-600 hover:text-gray-700 focus:outline-none">
          <i data-feather="x-circle" class="w-5 h-5 mr-2"></i>
          {{__('Clear filters')}}
        </button>
      </div>
    @endif
@endif
