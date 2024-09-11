<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('admin.users.store') }}" enctype="multipart/form-data">
                     
                        @csrf
                        @method(empty($user) ? 'POST' : 'PUT')

                        @if(session('error'))
                            <div class="bg-red-500 text-white p-3 rounded mb-3">
                                {{ session('error') }}
                            </div>
                        @endif
                      
                        <label  class="block text-sm font-medium text-gray-700 dark:text-gray-400">nombre</label>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', empty($user) ? '' : $user->name)" required placeholder="Ingresa nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', empty($user) ? '' : $user->email)" required placeholder="Ingresa el email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Contraseña</label>
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password', empty($user) ? '' : $user->password)" required placeholder="Ingresa la contraseña" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            
             
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Confirmar Contraseña</label>
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder="Confirma la contraseña" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        
                                





                        <div class="mt-4 space-x-8">
                            <x-primary-button>Guardar</x-primary-button>
                            <a href="{{route ('admin.users.user')}}" class="dark:text-gray-100">Cancelar</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>