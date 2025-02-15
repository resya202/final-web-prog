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
                        <td>Assigned To</td>
                        <td>Milestone</td>
                        <td>Deadline</td>
                    </x-slot>
                    <x-slot name="content">
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    <x-button variant=primary :href="route('task.show', $task->id)">
                                        Detail
                                    </x-button>
                                    @if (\Auth::user()->role_name == 'Admin')
                                        <x-button variant=secondary :href="route('task.edit', $task->id)">
                                            Edit
                                        </x-button>
                                    @endif
                                </td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ optional($task->assigned)->name ?? '-' }}</td>
                                <td>{{ optional($task->milestone)->name ?? '-' }}</td>
                                <td>{{ $task->end_date }}</td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable>
            </div>
        </div>
    </div>
</div>
