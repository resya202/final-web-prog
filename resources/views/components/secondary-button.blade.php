@props([
    'href' => null,
    'target' => null,
    'variant' => 'primary',
])

@php
    $baseClasses = 'inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150';

    $variants = [
        'primary' => 'bg-gray-800 text-white border-transparent hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500 focus:ring-offset-2',
        'secondary' => 'bg-white text-gray-700 border-gray-300 shadow-sm hover:bg-gray-50 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" @if($target) target="{{ $target }}" @endif {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
