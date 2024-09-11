<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-6 py-4">
                    <form method="GET" action="{{ route('client.books.Mybook') }}">
                        <x-text-input name="search" value="{{ request('search') }}" class="w-full" type="text" placeholder="Busqueda por nombre de libro"/>
                    </form>                
                </div>
                @if (session()->has('message'))
                    <div class="text-center bg-gray-100 rounded-md p-2">
                        <span class="text-indigo-600 text-xl">{{ session('message') }}</span>
                    </div>  
                @endif
            </div>
            <h1>MIS LIBROS</h1>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                @forelse($books as $book)
                    <div class="p-6 flex space-x-2">
                        <div class="flex-1 pl-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="mt-3 text-lg text-gray-900 dark:text-gray-100">{{ $book->nombre }}</p>
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
                                            <x-dropdown-link :href="route('client.books.Myshow', $book->id)">
                                                {{ __('Ver') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                @endauth
                            </div>
                            <img src="{{ asset($book->imagen) }}" style="width: 200px; height: auto;" />
                        </div>
                    </div>
                @empty
                    <h2 class="text-xl text-black p-4">No tienes libros reservados!</h2>
                @endforelse
            </div>
        </div>
    </div>
    <div class="p-6">
        {{ $books->links() }} <!-- Muestra los botones de paginación -->
    </div>
</x-app-layout>
