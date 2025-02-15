<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Milestone') }}
        </h2>
        <div class="ml-auto">
            <x-button variant=light :href="route('milestone.index')">Back</x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mb-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$milestone->name"
                            readonly />
                    </div>
                    @if (\Auth::user()->role_name == 'Admin')
                    <x-button variant=danger :href="route('milestone.destroy', $milestone->id)">Delete Milestone</x-button>
                    <x-button variant=primary :href="route('milestone.edit', $milestone->id)">Edit Milestone</x-button>
                    @endif

                </div>
            </div>
        </div>
    </div>


    @include('task.partials.list', ['tasks' => $tasks])
</x-app-layout>
