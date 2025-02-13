@props([
    'tasks' => [],
])

<div x-data="{ tasks: @js($tasks) }" x-init="window.InitGantt($el, $data)"></div>
