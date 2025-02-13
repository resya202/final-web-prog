@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option',
    'class' => ''
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</label>
    @endif
    <select id="{{ $name }}" name="{{ $name }}"
        class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm {{ $class }}">
        <option value="" disabled selected>{{ $placeholder }}</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @if($selected == $value) selected @endif>{{ $text }}</option>
        @endforeach
    </select>
</div>
