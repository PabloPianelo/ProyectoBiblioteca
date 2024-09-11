<div>
    <!-- Campo de búsqueda -->
    <input type="text" class="w-full p-2 border rounded" placeholder="Buscar libro por nombre..." wire:model="search" />

    <!-- Lista de libros filtrados -->
    <div class="mt-4">
        @forelse($books as $book)
            <div class="p-6 flex space-x-2 border-b">
                <div class="flex-1 pl-3">
                    <p class="text-lg text-gray-900 dark:text-gray-100">{{ $book->nombre }}</p>
                    <img src="{{ asset($book->imagen) }}" style="width: 200px; height: auto;" />
                </div>
            </div>
        @empty
            <h2 class="text-xl text-black p-4">No existen libros almacenados!</h2>
        @endforelse

        <!-- Paginación -->
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</div>
