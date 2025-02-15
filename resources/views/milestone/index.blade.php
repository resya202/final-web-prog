<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Milestone') }}
        </h2>
        <div class="ml-auto">
            <x-button :href="route('milestone.create')">Create New Milestone</x-button>
        </div>
    </x-slot>

    @include('milestone.partials.list', ['milestones' => $milestones])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-gantt-chart :tasks="$gantt_milestones" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
