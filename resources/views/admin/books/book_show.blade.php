<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl pb-3">{{$book->nombre}}</h1>

                    <p>{{$book->editorial}}</p>
                    <p>{{$book->autor}}</p>
                    <p>{{$book->genero}}</p>
                    <p>{{$book->tipo_libro}}</p>
                    <p>{{$book->cantidad}}</p>
                    <img src="{{ asset($book->imagen) }}" style="width: 200px; height: auto;" alt="Imagen del Libro" />
                    {{--  poner la ruta de action para hacer put--}}
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="mt-4 space-x-8">
                            {{-- @cannot('update', $idea) --}}
                           
                          
                            
                            {{-- @endcannot --}}
                            <a href="{{ route('admin.books.book') }}" class="dark:text-gray-100">{{ __('Regresar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>