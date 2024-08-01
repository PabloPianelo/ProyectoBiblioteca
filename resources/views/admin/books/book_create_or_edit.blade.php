<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="">
                        @csrf
                        @method('post')

                        @if(session('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-3">
                            {{ session('error') }}
                        </div>
                    @endif
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">ISBN</label>
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id')" required placeholder="Ingresa el ISBN" />
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                        
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Título</label>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required placeholder="Ingresa título" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Editorial</label>
                        <x-text-input  id="editorial" class="block mt-1 w-full" type="text" name="editorial" :value="old('editorial')" required placeholder="Ingresa la editorial" />
                        <x-input-error :messages="$errors->get('editorial')" class="mt-2" />


                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">Autor</label>
                        <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor')" required placeholder="Ingresa el autor" />
                        <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                            <br>
                            <label for="genero">Elige un género:</label>
                            <select id="genero" required name="genero" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige un Opción</option>
                                <option value="aventura">Aventura</option>
                                <option value="ciencia_ficcion">Ciencia Ficción</option>
                                <option value="fantasia">Fantasía</option>
                                <option value="romance">Romance</option>
                                <option value="misterio">Misterio</option>
                                <option value="suspenso">Suspenso</option>
                                <option value="thriller">Thriller</option>
                                <option value="historico">Histórico</option>
                                <option value="biografia">Biografía</option>
                                <option value="autobiografia">Autobiografía</option>
                                <option value="ficcion_contemporanea">Ficción Contemporánea</option>
                                <option value="clasicos">Clásicos</option>
                                <option value="poesia">Poesía</option>
                                <option value="teatro">Teatro</option>
                                <option value="ensayo">Ensayo</option>
                                <option value="novela_grafica">Novela Gráfica</option>
                                <option value="cuento">Cuento</option>
                                <option value="infantil">Infantil</option>
                                <option value="juvenil">Juvenil</option>
                                <option value="horror">Horror</option>
                                <option value="humor">Humor</option>
                                <option value="autoayuda">Autoayuda</option>
                                <option value="educativo">Educativo</option>
                                <option value="filosofia">Filosofía</option>
                                <option value="ciencias_sociales">Ciencias Sociales</option>
                                <option value="viajes">Viajes</option>
                                <option value="gastronomia">Gastronomía</option>
                                <option value="deportes">Deportes</option>
                                <option value="politica">Política</option>
                                <option value="economia">Economía</option>
                            </select>


                            <label for="tipo_libro">Elige un tipo de libro:</label>
                            <select id="tipo_libro"  required name="tipo_libro" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige un Opción</option>
                                <option value="fisico">Fisico</option>
                                <option value="digital">Digital</option>
                            </select>

                            <label style="display: none;" for="tipo_libro2">Elige un tipo de libro:</label>
                            <select style="display: none;" required id="tipo_libro2" name="tipo_libro2" class="mt-1 block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Elige un Opción</option>
                                <option value="revista">Revista</option>
                                <option value="comic">Comic</option>
                                <option value="maga">Maga</option>
                                <option value="tapa_dura">Tapa dura</option>
                                <option value="tapa_blanda">Tapa  blanda</option>
                            </select>


                            <div class="mt-4">
                                <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Imagen</label>
                                <input type="file"  name="imagen" id="imagen" class="block w-full text-sm text-gray-500 dark:text-gray-400 dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded-md shadow-sm"/>
                                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                            </div>






                        <div class="mt-4 space-x-8">
                            <x-primary-button>Guardar</x-primary-button>
                            <a href="{{route ('admin.books.book')}}" class="dark:text-gray-100">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoLibroSelect = document.getElementById('tipo_libro');
            const tipoLibro2Select = document.getElementById('tipo_libro2');
            const tipoLibro2Label = document.querySelector('label[for="tipo_libro2"]');

            tipoLibroSelect.addEventListener('change', function() {
                if (this.value) { 
                    tipoLibro2Select.style.display = 'block';
                    tipoLibro2Label.style.display = 'block';
                } else {
                    tipoLibro2Select.style.display = 'none';
                    tipoLibro2Label.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>