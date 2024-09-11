<x-app-layout>
    <div class="py-12">
        {{-- @if (session()->has('message'))
                
          
        <div class="text-center bg-gray-100 rounded-md p-2">
        <span class="text-indigo-600 text-xl">{{session('message')}}</span>
        </div>
       
            
        @endif
        --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   

                    <h1 class="text-xl pb-3">{{ $book->nombre }}</h1>

                    <p>{{ $book->editorial }}</p>
                    <p>{{ $book->autor }}</p>
                    <p>{{ $book->genero }}</p>
                    <p>{{ $book->tipo_libro }}</p>
                    <p>{{$book->cantidad}}</p>
                    <img src="{{ asset($book->imagen) }}" style="width: 200px; height: auto;" alt="Imagen del Libro" />
              
                    <form method="POST" action="{{ route('client.devolucion', $book->id) }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-blak px-4 py-2 rounded">Devolver</button>
                    </form>

                    <div class="mt-4">
                        
                        <a href="{{ route('client.books.Mybook') }}" class="dark:text-gray-100">{{ __('Regresar') }}</a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>
