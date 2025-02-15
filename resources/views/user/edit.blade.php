<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }} - {{ $user->name }}
        </h2>
        <div class="ml-auto">
            <x-button variant=light :href="route('user.index')">Cancel</x-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit User') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('user.update', $user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method("PUT")
                            <div>
                                <x-input-label for="name" value="{{ __('Name') }}*" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" value="{{ __('Email') }}*" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="password" value="{{ __('Password') }}*" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div class="mb-2">
                                <x-select-input name="role" label="Role" :options="['Admin' => 'Admin', 'Member' => 'Member']" :selected="$user->role_name"
                                    class="mt-1 block w-full" readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
</x-app-layout>
