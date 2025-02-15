<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Task') }} - {{$task->name}}
        </h2>
        <div class="ml-auto">
            <x-button variant="light" :href="route('task.index')">Back</x-button>
            @if (\Auth::user()->role_name == 'Admin')
            <x-button variant="danger" :href="route('task.destroy', $task->id)">Delete Task</x-button>
            <x-button variant="primary" :href="route('task.edit', $task->id)">Edit Task</x-button>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                        </header>

                            <div class="mb-2">
                                <x-input-label for="name" value="{{ __('Name') }}*" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $task->name)"
                                    readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>


                            <div class="mb-2">
                                <x-select-input readonly="true" name="status" label="Status" :options="['TODO' => 'Todo', 'PROGRESS' => 'In Progress', 'DONE' => 'Done']" :selected="$task->status"
                                    class="mt-1 block w-full" readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>


                            <div class="mb-2">
                                <x-input-label for="assigned_to" value="{{ __('Assigned To') }}*" />
                                <x-text-input id="assigned_to" name="assigned_to" type="text" class="mt-1 block w-full" :value="old('assigned_to', optional($task->assigned)->name)"
                                    readonly />
                            </div>

                            <div class="mb-2">
                                <x-input-label for="milestone_id" value="{{ __('Milestone') }}*" />
                                <x-text-input id="milestone_id" name="milestone_id" type="text" class="mt-1 block w-full" :value="old('milestone_id', optional($task->milestone)->name)"
                                    readonly />
                            </div>

                            <div class="mb-2">
                                <x-input-label for="start_date" value="{{ __('Timeline') }}*" />
                                <div id="date-range-picker" x-init="InitDaterangePicker($el)" class="flex items-center w-full">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-range-start" name="start_date" type="text" readonly
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                            placeholder="Select date start" :value="optional($task - > start_date) - > format("d/m/Y")">
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-range-end" name="end_date" type="text" readonly
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                                            placeholder="Select date end" value="{{ optional($task->end_date)->format('d/m/Y') }}">
                                    </div>
                                </div>
                            </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

