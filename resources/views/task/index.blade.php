<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task') }}
            </h2>
            <div class="ml-auto">
                <x-primary-button :href="route('task.create')">Create New Task</x-primary-button>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class="h1">Gantt Chart</span>
                    <hr>
                    <br>
                    <x-gantt-chart :tasks="$tasks" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
