<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('New Task') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Add task with milestone and assigned user.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('task.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" value="{{ __('Name') }}*" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $task->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-select-input name="status" label="Status" :options="['TODO' => 'Todo', 'PROGRESS' => 'In Progress', 'DONE' => 'Done']" :selected="$task->status"
                class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>


        <div>
            <x-select-input name="assigned_to" label="Assign to" :options="$assigned_options" :selected="$task->assigned_to"
                class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('assigned_to')" />
        </div>

        <div>
            <x-select-input name="milestone_id" label="Milestone" :options="$milestone_options" :selected="$task->milestone_id"
                class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('milestone_id')" />
        </div>

        <div>
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
                    <input id="datepicker-range-start" name="start_date" type="text"
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
                    <input id="datepicker-range-end" name="end_date" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                        placeholder="Select date end" value="{{ optional($task->end_date)->format('d/m/Y') }}">
                </div>
            </div>
        </div>




        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
