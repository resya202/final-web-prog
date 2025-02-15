<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
        <div class="ml-auto">
            <x-primary-button :href="route('user.create')">Create New User</x-primary-button>
        </div>
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
                        <x-slot name="content">
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <x-button variant=primary :href="route('user.show', $user->id)">
                                            Detail
                                        </x-button>
                                        <x-button variant=secondary :href="route('user.edit', $user->id)">
                                            Edit
                                        </x-button>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
