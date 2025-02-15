
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <x-header-text>Milestone List</x-header-text>
                <hr>
                <x-datatable>
                    <x-slot name="column">
                        <td>Action</td>
                        <td>Milestone Name</td>
                        <td>Status</td>
                        <td>Progress</td>
                        <td>Deadline</td>
                    </x-slot>
                    <x-slot name="content">
                        @foreach ($milestones as $milestone)
                            <tr>
                                <td>
                                    <x-button variant=primary :href="route('milestone.show', $milestone->id)">
                                        Detail
                                    </x-button>
                                    <x-button variant=secondary :href="route('milestone.edit', $milestone->id)">
                                        Edit
                                    </x-button>
                                </td>
                                <td>{{ $milestone->name }}</td>
                                <td>{{ $milestone->status }}</td>
                                <td>{{ $milestone->progress ?? "-" }}</td>
                                <td>{{ $milestone->end_date }}</td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable>
            </div>
        </div>
    </div>
</div>
