<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }} - {{ $user->name }}
        </h2>
        <div class="ml-auto">
            <x-button variant="light" :href="route('user.index')">Cancel</x-button>
            <x-button variant="danger" :href="route('user.destroy', $user->id)">Delete User</x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid grid-cols-3">
                    <div class="mb-4">
                        <x-input-label for="name" value="{{ __('Name') }}" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-100" :value="old('name', $user->name)"
                            readonly />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="email" value="{{ __('Email') }}" />
                        <x-text-input id="email" name="email" type="text" class="mt-1 block w-100" :value="old('email', $user->email)"
                            readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-header-text>Task List</x-header-text>
                    <hr>
                    <x-datatable>
                        <x-slot name="column">
                            <td>Action</td>
                            <td>Task Name</td>
                            <td>Status</td>
                            <td>Deadline</td>
                        </x-slot>
                        <x-slot name="content">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        <x-button variant=primary :href="route('task.show', $task->id)">
                                            Detail
                                        </x-button>
                                        <x-button variant=secondary :href="route('task.edit', $task->id)">
                                            Edit
                                        </x-button>
                                    </td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->end_date }}</td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
