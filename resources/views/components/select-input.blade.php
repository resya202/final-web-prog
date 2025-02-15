@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option',
    'class' => '',
    'readonly' => false
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    <select id="{{ $name }}" name="{{ $name }}" {{$readonly ? "readonly" : ""}}
        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white text-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $class }}">
        <option value="" disabled selected>{{ $placeholder }}</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @if($selected == $value) selected @endif>{{ $text }}</option>
        @endforeach
    </select>
</div>
