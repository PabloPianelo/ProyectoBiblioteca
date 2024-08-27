<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl pb-3">{{$user->name}}</h1>

                    <p>{{$user->email}}</p>

                    <td>
                        @foreach($user->getRoleNames() as $role)
                            <span>{{ $role }}</span>@if (!$loop->last), @endif
                        @endforeach
                    </td>

                    <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}">
                        @csrf
                        @method('PUT')
                       
                        <div class="mt-4 space-x-8">
                            <button type="submit" class="px-4 py-2  text-black rounded">
                                {{ $user->activo ? 'Desactivar' : 'Activar' }}
                            </button>
                            <a href="{{ route('admin.users.user') }}" class="dark:text-gray-100">{{ __('Regresar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
