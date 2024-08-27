<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ empty($book) ?route('admin.books.store'):route('admin.books.update',$book) }}" enctype="multipart/form-data">
                        @csrf
                        @method(empty($book) ? 'POST' : 'PUT')


                        @if(session('error'))
                            <div class="bg-red-500 text-white p-3 rounded mb-3">
                                {{ session('error') }}
                            </div>
                        @endif
                      
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Título</label>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', empty($book) ? '' : $book->nombre)" required placeholder="Ingresa título" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Editorial</label>
                        <x-text-input  id="editorial" class="block mt-1 w-full" type="text" name="editorial" :value="old('editorial', empty($book) ? '' : $book->editorial)" required placeholder="Ingresa la editorial" />
                        <x-input-error :messages="$errors->get('editorial')" class="mt-2" />
                        
                          
                            <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Cantidad</label>
                            <x-text-input  id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" :value="old('cantidad', empty($book) ? '' : $book->cantidad)" required placeholder="Ingresa la cantidad" />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />


                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Autor</label>
                        <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor', empty($book) ? '' : $book->autor)" required placeholder="Ingresa el autor" />
                        <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                            <br>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="genero">Elige un género:</label>
                            <select id="genero" required name="genero" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige una Opción</option>
                                <option value="aventura" {{ old('genero', empty($book) ? '' : $book->genero) == 'aventura' ? 'selected' : '' }}>Aventura</option>
                                <option value="ciencia_ficcion" {{ old('genero', empty($book) ? '' : $book->genero) == 'ciencia_ficcion' ? 'selected' : '' }}>Ciencia Ficción</option>
                                <option value="fantasia" {{ old('genero', empty($book) ? '' : $book->genero) == 'fantasia' ? 'selected' : '' }}>Fantasía</option>
                                <option value="romance" {{ old('genero', empty($book) ? '' : $book->genero) == 'romance' ? 'selected' : '' }}>Romance</option>
                                <option value="misterio" {{ old('genero', empty($book) ? '' : $book->genero) == 'misterio' ? 'selected' : '' }}>Misterio</option>
                                <option value="suspenso" {{ old('genero', empty($book) ? '' : $book->genero) == 'suspenso' ? 'selected' : '' }}>Suspenso</option>
                                <option value="thriller" {{ old('genero', empty($book) ? '' : $book->genero) == 'thriller' ? 'selected' : '' }}>Thriller</option>
                                <option value="historico" {{ old('genero', empty($book) ? '' : $book->genero) == 'historico' ? 'selected' : '' }}>Histórico</option>
                                <option value="biografia" {{ old('genero', empty($book) ? '' : $book->genero) == 'biografia' ? 'selected' : '' }}>Biografía</option>
                                <option value="autobiografia" {{ old('genero', empty($book) ? '' : $book->genero) == 'autobiografia' ? 'selected' : '' }}>Autobiografía</option>
                                <option value="ficcion_contemporanea" {{ old('genero', empty($book) ? '' : $book->genero) == 'ficcion_contemporanea' ? 'selected' : '' }}>Ficción Contemporánea</option>
                                <option value="clasicos" {{ old('genero', empty($book) ? '' : $book->genero) == 'clasicos' ? 'selected' : '' }}>Clásicos</option>
                                <option value="poesia" {{ old('genero', empty($book) ? '' : $book->genero) == 'poesia' ? 'selected' : '' }}>Poesía</option>
                                <option value="teatro" {{ old('genero', empty($book) ? '' : $book->genero) == 'teatro' ? 'selected' : '' }}>Teatro</option>
                                <option value="ensayo" {{ old('genero', empty($book) ? '' : $book->genero) == 'ensayo' ? 'selected' : '' }}>Ensayo</option>
                                <option value="novela_grafica" {{ old('genero', empty($book) ? '' : $book->genero) == 'novela_grafica' ? 'selected' : '' }}>Novela Gráfica</option>
                                <option value="infantil" {{ old('genero', empty($book) ? '' : $book->genero) == 'infantil' ? 'selected' : '' }}>Infantil</option>
                                <option value="juvenil" {{ old('genero', empty($book) ? '' : $book->genero) == 'juvenil' ? 'selected' : '' }}>Juvenil</option>
                                <option value="horror" {{ old('genero', empty($book) ? '' : $book->genero) == 'horror' ? 'selected' : '' }}>Horror</option>
                                <option value="humor" {{ old('genero', empty($book) ? '' : $book->genero) == 'humor' ? 'selected' : '' }}>Humor</option>
                                <option value="autoayuda" {{ old('genero', empty($book) ? '' : $book->genero) == 'autoayuda' ? 'selected' : '' }}>Autoayuda</option>
                                <option value="educativo" {{ old('genero', empty($book) ? '' : $book->genero) == 'educativo' ? 'selected' : '' }}>Educativo</option>
                                <option value="filosofia" {{ old('genero', empty($book) ? '' : $book->genero) == 'filosofia' ? 'selected' : '' }}>Filosofía</option>
                                <option value="ciencias_sociales" {{ old('genero', empty($book) ? '' : $book->genero) == 'ciencias_sociales' ? 'selected' : '' }}>Ciencias Sociales</option>
                                <option value="viajes" {{ old('genero', empty($book) ? '' : $book->genero) == 'viajes' ? 'selected' : '' }}>Viajes</option>
                                <option value="gastronomia" {{ old('genero', empty($book) ? '' : $book->genero) == 'gastronomia' ? 'selected' : '' }}>Gastronomía</option>
                                <option value="deportes" {{ old('genero', empty($book) ? '' : $book->genero) == 'deportes' ? 'selected' : '' }}>Deportes</option>
                                <option value="politica" {{ old('genero', empty($book) ? '' : $book->genero) == 'politica' ? 'selected' : '' }}>Política</option>
                                <option value="economia" {{ old('genero', empty($book) ? '' : $book->genero) == 'economia' ? 'selected' : '' }}>Economía</option>

                            </select>


                            <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="tipo_libro">Elige un tipo de libro:</label>
                            <select id="tipo_libro" required name="tipo_libro" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige una Opción</option>
                                <option value="fisico" {{ in_array('fisico', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Físico</option>
                                <option value="digital" {{ in_array('digital', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Digital</option>
                            </select>

                            <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400" style="display: none;" for="tipo_libro2">Elige un tipo de libro:</label>
                            <select style="display: none;" required id="tipo_libro2" name="tipo_libro2" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige un Opción</option>
                                <option value="revista"{{ in_array('revista', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Revista</option>
                                <option value="comic"{{ in_array('comic', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Comic</option>
                                <option value="manga"{{ in_array('manga', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Manga</option>
                                <option value="tapa dura"{{ in_array('tapa dura', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Tapa dura</option>
                                <option value="tapa blanda"{{ in_array('tapa blanda', explode(',', old('tipo_libro', empty($book) ? '' : $book->tipo_libro))) ? 'selected' : '' }}>Tapa  blanda</option>
                            </select>


                            @if(!empty($book))
                            <br>
                            <label for="imagenActual" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Imagen Actual</label>
                            <img src="{{ asset($book->imagen) }}" style="width: 200px; height: auto;" alt="Imagen del Libro" />
                        @endif

                        <div class="mt-4">
                            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Insertar Nueva Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="block w-full text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded-md shadow-sm"/>
                            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                        </div>






                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{ empty($book) ? 'Guardar' : 'Actualizar' }}</x-primary-button>
                            <a href="{{route ('admin.books.book')}}" class="dark:text-gray-100">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="book_exists" value="{{ empty($book) ? 'false' : 'true' }}">

    <script>
            document.addEventListener('DOMContentLoaded', function() {
            const tipoLibroSelect = document.getElementById('tipo_libro');
            const tipoLibro2Select = document.getElementById('tipo_libro2');
            const tipoLibro2Label = document.querySelector('label[for="tipo_libro2"]');
            const bookExists = document.getElementById('book_exists').value === 'true';

            function updateVisibility() {
                // console.log('Tipo Libro Value:', tipoLibroSelect.value);
                // console.log('Book Exists:', bookExists);
                
                if (tipoLibroSelect.value || bookExists) {
                    tipoLibro2Select.style.display = 'block';
                    tipoLibro2Label.style.display = 'block';
                } else {
                    tipoLibro2Select.style.display = 'none';
                    tipoLibro2Label.style.display = 'none';
                }
            }

            updateVisibility();
            tipoLibroSelect.addEventListener('change', updateVisibility);
        });
    </script>
</x-app-layout>