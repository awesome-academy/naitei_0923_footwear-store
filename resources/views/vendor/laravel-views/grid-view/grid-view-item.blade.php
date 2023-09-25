@props([
  'image' => '',
  'name' => '',
  'brand' => '',
  'description' => '',
  'withBackground' => false,
  'model',
  'actions' => [],
  'hasDefaultAction' => false,
  'selected' => false
])

<div class="{{ $withBackground ? 'rounded-md shadow-md' : '' }}">
  @if ($hasDefaultAction)
    <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
      <img src="{{ $image }}" alt="{{ $image }}" class="hover:shadow-lg cursor-pointer rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }} {{ $selected ? variants('gridView.selected') : "" }}">
    </a>
  @else
    <img src="{{ $image }}" alt="{{ $image }}" class="rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  @endif

  <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-gray-900">
          @if ($hasDefaultAction)
            <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
              {!! $brand !!}
            </a>
          @else
            {!! $brand !!}
          @endif
        </h3>
        @if ($name)
          <span class="text-sm text-gray-600">
            {!! $name !!}
          </span>
        @endif
      </div>

      @if (count($actions))
        <div class="flex items-center justify-end">
          <x-lv-actions :actions="$actions" :model="$model" />
        </div>
      @endif
    </div>

    @if (isset($description))
      <p class="mt-2 line-clamp-3">
        {!! $description !!}
      </p>
    @endif
  </div>

</div>
