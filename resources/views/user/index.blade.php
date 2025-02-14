<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-datatable :src="route('user.datatable')">
                        <x-slot name="column">
                            <td>Action</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Created At</td>
                        </x-slot>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
