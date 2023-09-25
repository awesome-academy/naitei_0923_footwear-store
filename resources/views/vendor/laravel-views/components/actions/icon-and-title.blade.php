@props(['actions', 'model' => null])

@foreach ($actions as $action)
  @if ($action->renderIf($model, $this))
    <button
      wire:click.prevent="{{ $model ? "executeAction('{$action->id}','{$model->getKey()}')" : "executeBulkAction('{$action->id}')" }}"
      title="{{ __($action->title) }}"
      class="flex items-center w-full px-4 py-2 text-gray-700 group hover:bg-gray-100 hover:text-gray-900 focus:outline-none"
    >
      <i data-feather="{{ $action->icon }}" class="w-4 h-4 mr-3 text-gray-600 group-hover:text-gray-700"></i>
      {{ __($action->title) }}
    </button>
  @endif
@endforeach
