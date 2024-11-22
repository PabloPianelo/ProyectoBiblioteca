<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100s space-x-8">
                    <a href="{{route ('admin.users.create') }}" class="px-4 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Agregar') }}</a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                @forelse($users as $user)
                    <div class="p-6 flex space-x-2 {{ $user->activo ? 'bg-white dark:bg-gray-800' : 'bg-red-500 dark:bg-red-200' }}">
                        <div class="flex-1 pl-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="mt-3 text-lg text-gray-900 dark:text-gray-100">
                                        {{ $user->name }}
                                    </p>
                                </div>
                                @auth
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('admin.users.show',$user->id)">
                                                {{ __('Ver') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-xl text-black p-4">No existen usuarios almacenados!</h2>
                @endforelse
            </div>
        </div>
    </div>
    <div class="p-6">
        {{ $users->links() }} <!-- Esto muestra los botones de paginación -->
    </div>
</x-app-layout>
